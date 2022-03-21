<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHoraireRequest;
use App\Http\Requests\UpdateHoraireRequest;
use App\Http\Resources\Admin\HoraireResource;
use App\Models\Horaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoraireApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HoraireResource(Horaire::with(['users'])->get());
    }

    public function store(StoreHoraireRequest $request)
    {
        $horaire = Horaire::create($request->all());
        $horaire->users()->sync($request->input('users', []));

        return (new HoraireResource($horaire))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Horaire $horaire)
    {
        abort_if(Gate::denies('horaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HoraireResource($horaire->load(['users']));
    }

    public function update(UpdateHoraireRequest $request, Horaire $horaire)
    {
        $horaire->update($request->all());
        $horaire->users()->sync($request->input('users', []));

        return (new HoraireResource($horaire))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Horaire $horaire)
    {
        abort_if(Gate::denies('horaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horaire->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
