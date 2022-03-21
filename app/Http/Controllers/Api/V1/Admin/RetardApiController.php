<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRetardRequest;
use App\Http\Requests\UpdateRetardRequest;
use App\Http\Resources\Admin\RetardResource;
use App\Models\Retard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RetardApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('retard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RetardResource(Retard::with(['user', 'traffic', 'team'])->get());
    }

    public function store(StoreRetardRequest $request)
    {
        $retard = Retard::create($request->all());

        return (new RetardResource($retard))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Retard $retard)
    {
        abort_if(Gate::denies('retard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RetardResource($retard->load(['user', 'traffic', 'team']));
    }

    public function update(UpdateRetardRequest $request, Retard $retard)
    {
        $retard->update($request->all());

        return (new RetardResource($retard))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Retard $retard)
    {
        abort_if(Gate::denies('retard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retard->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
