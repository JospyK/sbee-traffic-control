<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSituationGeographiqueRequest;
use App\Http\Requests\UpdateSituationGeographiqueRequest;
use App\Http\Resources\Admin\SituationGeographiqueResource;
use App\Models\SituationGeographique;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SituationGeographiqueApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('situation_geographique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SituationGeographiqueResource(SituationGeographique::all());
    }

    public function store(StoreSituationGeographiqueRequest $request)
    {
        $situationGeographique = SituationGeographique::create($request->all());

        return (new SituationGeographiqueResource($situationGeographique))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SituationGeographique $situationGeographique)
    {
        abort_if(Gate::denies('situation_geographique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SituationGeographiqueResource($situationGeographique);
    }

    public function update(UpdateSituationGeographiqueRequest $request, SituationGeographique $situationGeographique)
    {
        $situationGeographique->update($request->all());

        return (new SituationGeographiqueResource($situationGeographique))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SituationGeographique $situationGeographique)
    {
        abort_if(Gate::denies('situation_geographique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $situationGeographique->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
