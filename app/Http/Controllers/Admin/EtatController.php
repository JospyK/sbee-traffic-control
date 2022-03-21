<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ListeTrafficExport;
use App\Exports\TrafficAgentExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Traffic;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class EtatController extends Controller
{
    public function index()
    {
        return view('admin.etats.index');
    }

    public function traffic_agent()
    {
        $users = User::has('userTraffic',)->get()->each(function ($items) {
            $items->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            });
        })->load('userTraffic', 'horaires',); //1362

        $data = ["users" => $users];

        return Excel::download(new TrafficAgentExport($data), 'TrafficAgent.xls');

        return view('admin.etats.tables.trafficAgent', compact('users'));
    }


    public function generate(Request $request)
    {
        // $interval = [$request->debut . " 00:00:00", $request->fin . " 23:59:59"];
        // dd($request->etat);

        switch ($request->etat) {
            case 'liste_traffic':
                $traffics = Traffic::all()->load('user', 'user.horaires',);
                $data = ["traffics" => $traffics];
                return Excel::download(new ListeTrafficExport($data), 'ListeTraffic' . time() . '.xls');
                break;

            case 'traffic_agent':
                $users = User::has('userTraffic',)->get()->each(function ($items) {
                    $items->groupBy(function ($item) {
                        return $item->created_at->format('Y-m-d');
                    });
                })->load('userTraffic', 'horaires',); //1362
                $data = ["users" => $users];
                return Excel::download(new TrafficAgentExport($data), 'TrafficAgent' . time() . '.xls');
                break;

            default:
                # code...
                break;
        }


        return view('admin.etats.tables.traffic_agent', compact('users'));
    }
}
