<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySituationGeographiqueRequest;
use App\Http\Requests\StoreSituationGeographiqueRequest;
use App\Http\Requests\UpdateSituationGeographiqueRequest;
use App\Models\SituationGeographique;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SituationGeographiqueController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('situation_geographique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SituationGeographique::query()->select(sprintf('%s.*', (new SituationGeographique)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'situation_geographique_show';
                $editGate      = 'situation_geographique_edit';
                $deleteGate    = 'situation_geographique_delete';
                $crudRoutePart = 'situation-geographiques';

                return view('partials.datatablesActions', compact(
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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('libelle', function ($row) {
                return $row->libelle ? $row->libelle : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.situationGeographiques.index');
    }

    public function create()
    {
        abort_if(Gate::denies('situation_geographique_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.situationGeographiques.create');
    }

    public function store(StoreSituationGeographiqueRequest $request)
    {
        $situationGeographique = SituationGeographique::create($request->all());

        return redirect()->route('admin.situation-geographiques.index');
    }

    public function edit(SituationGeographique $situationGeographique)
    {
        abort_if(Gate::denies('situation_geographique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.situationGeographiques.edit', compact('situationGeographique'));
    }

    public function update(UpdateSituationGeographiqueRequest $request, SituationGeographique $situationGeographique)
    {
        $situationGeographique->update($request->all());

        return redirect()->route('admin.situation-geographiques.index');
    }

    public function show(SituationGeographique $situationGeographique)
    {
        abort_if(Gate::denies('situation_geographique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $situationGeographique->load('situationGeographiqueUsers');

        return view('admin.situationGeographiques.show', compact('situationGeographique'));
    }

    public function destroy(SituationGeographique $situationGeographique)
    {
        abort_if(Gate::denies('situation_geographique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $situationGeographique->delete();

        return back();
    }

    public function massDestroy(MassDestroySituationGeographiqueRequest $request)
    {
        SituationGeographique::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
