@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.direction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.directions.update", [$direction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="code">{{ trans('cruds.direction.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $direction->code) }}">
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.direction.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="libelle">{{ trans('cruds.direction.fields.libelle') }}</label>
                <input class="form-control {{ $errors->has('libelle') ? 'is-invalid' : '' }}" type="text" name="libelle" id="libelle" value="{{ old('libelle', $direction->libelle) }}">
                @if($errors->has('libelle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('libelle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.direction.fields.libelle_helper') }}</span>
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