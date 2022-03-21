@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horaire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.horaire.fields.id') }}
                        </th>
                        <td>
                            {{ $horaire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horaire.fields.name') }}
                        </th>
                        <td>
                            {{ $horaire->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horaire.fields.arrivee') }}
                        </th>
                        <td>
                            {{ $horaire->arrivee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horaire.fields.depart') }}
                        </th>
                        <td>
                            {{ $horaire->depart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horaire.fields.user') }}
                        </th>
                        <td>
                            @foreach($horaire->users as $key => $user)
                                <span class="label label-info">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection