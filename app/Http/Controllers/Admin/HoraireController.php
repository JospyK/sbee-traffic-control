<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHoraireRequest;
use App\Http\Requests\StoreHoraireRequest;
use App\Http\Requests\UpdateHoraireRequest;
use App\Models\Horaire;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HoraireController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('horaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Horaire::withCount(['users']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'horaire_show';
                $editGate      = 'horaire_edit';
                $deleteGate    = 'horaire_delete';
                $crudRoutePart = 'horaires';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('arrivee', function ($row) {
                return $row->arrivee ? $row->arrivee : "";
            });
            $table->editColumn('depart', function ($row) {
                return $row->depart ? $row->depart : "";
            });
            $table->editColumn('user', function ($row) {
                return $row->users_count ? $row->users_count : 0;
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.horaires.index');
    }

    public function create()
    {
        abort_if(Gate::denies('horaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = Role::where('title', 'agent')->first()->users;

        return view('admin.horaires.create', compact('users'));
    }

    public function store(StoreHoraireRequest $request)
    {
        $horaire = Horaire::create($request->all());
        $horaire->users()->sync($request->input('users', []));

        return redirect()->route('admin.horaires.index');
    }

    public function edit(Horaire $horaire)
    {
        abort_if(Gate::denies('horaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = Role::where('title', 'agent')->first()->users;

        $horaire->load('users');

        return view('admin.horaires.edit', compact('users', 'horaire'));
    }

    public function update(UpdateHoraireRequest $request, Horaire $horaire)
    {
        $horaire->update($request->all());
        $horaire->users()->sync($request->input('users', []));

        return redirect()->route('admin.horaires.index');
    }

    public function show(Horaire $horaire)
    {
        abort_if(Gate::denies('horaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horaire->load('users');

        return view('admin.horaires.show', compact('horaire'));
    }

    public function destroy(Horaire $horaire)
    {
        abort_if(Gate::denies('horaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyHoraireRequest $request)
    {
        Horaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
