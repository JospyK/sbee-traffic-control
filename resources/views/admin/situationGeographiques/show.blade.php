@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.situationGeographique.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.situation-geographiques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.situationGeographique.fields.id') }}
                        </th>
                        <td>
                            {{ $situationGeographique->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.situationGeographique.fields.code') }}
                        </th>
                        <td>
                            {{ $situationGeographique->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.situationGeographique.fields.libelle') }}
                        </th>
                        <td>
                            {{ $situationGeographique->libelle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.situation-geographiques.index') }}">
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
            <a class="nav-link" href="#situation_geographique_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="situation_geographique_users">
            @includeIf('admin.situationGeographiques.relationships.situationGeographiqueUsers', ['users' => $situationGeographique->situationGeographiqueUsers])
        </div>
    </div>
</div>

@endsection