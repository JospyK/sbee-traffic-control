<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traffic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyTrafficRequest;
use Yajra\DataTables\Facades\DataTables;


class AgentsPresentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('agents_present_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            // $query = Traffic::with(['user'])->whereDate('created_at', today())->where('sortie', null)->select(sprintf('%s.*', (new Traffic)->table));
            $query = Traffic::with(['user'])->whereDate('created_at', today())->where('sortie', null)->get();
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

            $table->editColumn('temperature', function ($row) {
                return $row->temperature ? $row->temperature : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.agentsPresents.index');
    }
}
