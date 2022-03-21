@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.horaire.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horaires.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.horaire.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.horaire.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="arrivee">{{ trans('cruds.horaire.fields.arrivee') }}</label>
                <input class="form-control timepicker {{ $errors->has('arrivee') ? 'is-invalid' : '' }}" type="text" name="arrivee" id="arrivee" value="{{ old('arrivee') }}" required>
                @if($errors->has('arrivee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arrivee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.horaire.fields.arrivee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depart">{{ trans('cruds.horaire.fields.depart') }}</label>
                <input class="form-control timepicker {{ $errors->has('depart') ? 'is-invalid' : '' }}" type="text" name="depart" id="depart" value="{{ old('depart') }}" required>
                @if($errors->has('depart'))
                    <div class="invalid-feedback">
                        {{ $errors->first('depart') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.horaire.fields.depart_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.horaire.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $user->id }}" {{ in_array($user->id, old('users', [])) ? 'selected' : '' }}>{{ $user->matricule }} - {{ $user->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.horaire.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
