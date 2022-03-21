<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrafficRequest;
use App\Http\Requests\UpdateTrafficRequest;
use App\Http\Resources\Admin\TrafficResource;
use App\Models\Traffic;
use Carbon\Carbon;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Jobs\CheckRetardJob;
use App\Models\User;
use App\Notifications\TemperatureNotification;
use Notification;

class TrafficApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('traffic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrafficResource(Traffic::with(['user'])->whereDate('created_at', today())->get());
    }

    public function store(StoreTrafficRequest $request)
    {
        $user = User::findOrFail($request->user_id)->load('horaires');
        $traffic = Traffic::create([
            'entre' => Carbon::now()->toTimeString(),
            'user_id' => $user->id,
            'created_by' => Auth::id(),
            'temperature' => $request->temperature
        ]);

        if($traffic->temperature >= 38) {
            $data  = [
                'model_id' => $traffic->id,
                'temperature' => $traffic->temperature,
                'traffic_created_at' => $traffic->created_at,
                'user_name' => $user->name,
                'user_matricule' => $user->matricule,
            ];
            $users = User::whereHas('roles', function ($q) {
                return $q->where('title', 'Admin');
            })->get();
            Notification::send($users, new TemperatureNotification($data));
            $errors = ["ACCES NON AUTORISE. LA TEMPERATURE EST ELEVEE."];
        }

        CheckRetardJob::dispatch($user, $traffic);

        return (new TrafficResource($traffic))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Traffic $traffic)
    {
        abort_if(Gate::denies('traffic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrafficResource($traffic->load(['user']));
    }

    public function update(UpdateTrafficRequest $request, Traffic $traffic)
    {
        $traffic->update([
            "sortie" => Carbon::now()->toTimeString()
        ]);

        return (new TrafficResource($traffic))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Traffic $traffic)
    {
        abort_if(Gate::denies('traffic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $traffic->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
