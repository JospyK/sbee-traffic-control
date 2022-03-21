<?php

namespace App\Http\Controllers\Admin;

use App\Models\Traffic;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {

        $today_trafics = Traffic::whereDate('created_at', today());
        $entrees = $today_trafics->count();
        $sorties = $today_trafics->where('sortie', null)->count();

        $settings = [
            'chart_title'           => 'Courbe d\'évolution des trafics',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Traffic',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'field_distinct'        => 'user_id',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
        ];

        $chart = new LaravelChart($settings);

        return view('home', compact('entrees', 'sorties', 'chart'));
    }
}
