<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrafficRequest;
use App\Http\Requests\StoreTrafficRequest;
use App\Http\Requests\UpdateTrafficRequest;
use App\Jobs\CheckRetardJob;
use Session;
use App\Models\Role;
use App\Models\Traffic;
use App\Models\User;
use App\Notifications\TemperatureNotification;
use Carbon\Carbon;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Notification;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrafficController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('traffic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $date = $request->date;
        $idate = $request->date ? Carbon::parse($request->date) : today();
        if ($request->ajax()) {
            $query = Traffic::with(['user'])->whereDate('created_at', $idate)->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $viewGate      = 'traffic_show';
                $editGate      = 'traffic_edit';
                $deleteGate    = 'traffic_delete';
                $crudRoutePart = 'traffic';
                return view('partials.trafficDatatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('entre', function ($row) {
                return $row->entre ? $row->entre : "";
            });
            $table->editColumn('sortie', function ($row) {
                return $row->sortie ? $row->sortie : "";
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });
            $table->addColumn('user_matricule', function ($row) {
                return $row->user ? $row->user->matricule : '';
            });
            $table->editColumn('temperature', function ($row) {
                return $row->temperature ? $row->temperature : "";
            });
            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.traffic.index', compact('date'));
    }

    public function create()
    {
        abort_if(Gate::denies('traffic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = cache()->remember('users-list', 60 * 60 * 24, function () {
            return Role::where('title', 'agent')->first()->users->pluck('matricule_name', 'id');
        });

        return view('admin.traffic.create', compact('users'));
    }

    /**
     * Observer User here
     */
    public function store(StoreTrafficRequest $request)
    {
        $user = User::findOrFail($request->user_id)->load('horaires');
        $traffic = Traffic::create([
            'entre' => Carbon::now()->toTimeString(),
            'user_id' => $user->id,
            'created_by' => Auth::id(),
            'temperature' => $request->temperature
        ]);

        if ($traffic->temperature >= 38) {
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
            Session::flash('warning', "ACCES NON AUTORISE. LA TEMPERATURE EST ELEVEE.");
        }

        CheckRetardJob::dispatch($user, $traffic);

        return redirect()->route('admin.traffic.index');
    }

    public function edit(Traffic $traffic)
    {
        abort_if(Gate::denies('traffic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $traffic->load('user');

        return view('admin.traffic.edit', compact('users', 'traffic'));
    }

    public function update(UpdateTrafficRequest $request, Traffic $traffic)
    {
        $traffic->update([
            "sortie" => Carbon::now()->toTimeString(),
            #"sortie" => $request->sortie,
        ]);

        # return redirect()->route('admin.traffic.index');
        return redirect()->back();
    }

    public function show(Traffic $traffic)
    {
        abort_if(Gate::denies('traffic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $traffic->load('user', 'trafficRetards');

        return view('admin.traffic.show', compact('traffic'));
    }

    public function destroy(Traffic $traffic)
    {
        abort_if(Gate::denies('traffic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $traffic->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrafficRequest $request)
    {
        Traffic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
