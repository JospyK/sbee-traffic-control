<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDirectionRequest;
use App\Http\Requests\StoreDirectionRequest;
use App\Http\Requests\UpdateDirectionRequest;
use App\Models\Direction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DirectionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('direction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Direction::query()->select(sprintf('%s.*', (new Direction)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'direction_show';
                $editGate      = 'direction_edit';
                $deleteGate    = 'direction_delete';
                $crudRoutePart = 'directions';

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

        return view('admin.directions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('direction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directions.create');
    }

    public function store(StoreDirectionRequest $request)
    {
        $direction = Direction::create($request->all());

        return redirect()->route('admin.directions.index');
    }

    public function edit(Direction $direction)
    {
        abort_if(Gate::denies('direction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directions.edit', compact('direction'));
    }

    public function update(UpdateDirectionRequest $request, Direction $direction)
    {
        $direction->update($request->all());

        return redirect()->route('admin.directions.index');
    }

    public function show(Direction $direction)
    {
        abort_if(Gate::denies('direction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directions.show', compact('direction'));
    }

    public function destroy(Direction $direction)
    {
        abort_if(Gate::denies('direction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $direction->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectionRequest $request)
    {
        Direction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
