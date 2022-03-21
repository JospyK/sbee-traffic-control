<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRetardRequest;
use App\Http\Requests\StoreRetardRequest;
use App\Http\Requests\UpdateRetardRequest;
use App\Models\Retard;
use App\Models\Traffic;
use App\Models\User;
use App\Models\Team;
use Carbon\CarbonInterval;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RetardController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('retard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Retard::with(['user', 'traffic', 'team'])->select(sprintf('%s.*', (new Retard)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'retard_show';
                $editGate      = 'retard_edit';
                $deleteGate    = 'retard_delete';
                $crudRoutePart = 'retards';

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
            $table->editColumn('duree', function ($row) {
                return $row->duree ? CarbonInterval::minutes($row->duree)->cascade()->forHumans() : "";
            });
            $table->editColumn('date', function ($row) {
                return $row->created_at ? $row->created_at : '';
            });
            $table->addColumn('traffic_entre', function ($row) {
                return $row->traffic ? $row->traffic->entre : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'traffic']);

            return $table->make(true);
        }

        $users   = User::get();
        $traffic = Traffic::get();
        $teams   = Team::get();

        return view('admin.retards.index', compact('users', 'traffic', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('retard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $traffic = Traffic::all()->pluck('entre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.retards.create', compact('users', 'traffic'));
    }

    public function store(StoreRetardRequest $request)
    {
        $retard = Retard::create($request->all());

        return redirect()->route('admin.retards.index');
    }

    public function edit(Retard $retard)
    {
        abort_if(Gate::denies('retard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $traffic = Traffic::all()->pluck('entre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retard->load('user', 'traffic', 'team');

        return view('admin.retards.edit', compact('users', 'traffic', 'retard'));
    }

    public function update(UpdateRetardRequest $request, Retard $retard)
    {
        $retard->update($request->all());

        return redirect()->route('admin.retards.index');
    }

    public function show(Retard $retard)
    {
        abort_if(Gate::denies('retard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retard->load('user', 'traffic', 'team');

        return view('admin.retards.show', compact('retard'));
    }

    public function destroy(Retard $retard)
    {
        abort_if(Gate::denies('retard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retard->delete();

        return back();
    }

    public function massDestroy(MassDestroyRetardRequest $request)
    {
        Retard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
