@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.traffic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.traffic.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.traffic.fields.id') }}
                        </th>
                        <td>
                            {{ $traffic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.traffic.fields.entre') }}
                        </th>
                        <td>
                            {{ $traffic->entre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.traffic.fields.sortie') }}
                        </th>
                        <td>
                            {{ $traffic->sortie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.traffic.fields.user') }}
                        </th>
                        <td>
                            {{ $traffic->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.traffic.fields.temperature') }}
                        </th>
                        <td>
                            {{ $traffic->temperature }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.traffic.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#traffic_retards" role="tab" data-toggle="tab">
                {{ trans('cruds.retard.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="traffic_retards">
            @includeIf('admin.traffic.relationships.trafficRetards', ['retards' => $traffic->trafficRetards])
        </div>
    </div>
</div>

@endsection