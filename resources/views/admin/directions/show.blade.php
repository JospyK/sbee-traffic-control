@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.direction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.id') }}
                        </th>
                        <td>
                            {{ $direction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.code') }}
                        </th>
                        <td>
                            {{ $direction->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.libelle') }}
                        </th>
                        <td>
                            {{ $direction->libelle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directions.index') }}">
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
            <a class="nav-link" href="#direction_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="direction_users">
            @includeIf('admin.directions.relationships.directionUsers', ['users' => $direction->directionUsers])
        </div>
    </div>
</div>

@endsection