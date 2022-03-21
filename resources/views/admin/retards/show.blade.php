@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.retard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.retards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.retard.fields.id') }}
                        </th>
                        <td>
                            {{ $retard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.retard.fields.duree') }}
                        </th>
                        <td>
                            {{Carbon\CarbonInterval::minutes($retard->duree)->cascade()->forHumans()}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.retard.fields.user') }}
                        </th>
                        <td>
                            {{ $retard->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.retard.fields.traffic') }}
                        </th>
                        <td>
                            {{ $retard->traffic->entre ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.retards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
