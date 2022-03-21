@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.retard.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.retards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="duree">{{ trans('cruds.retard.fields.duree') }}</label>
                <input class="form-control {{ $errors->has('duree') ? 'is-invalid' : '' }}" type="number" name="duree" id="duree" value="{{ old('duree', '') }}" step="1" required>
                @if($errors->has('duree'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duree') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.retard.fields.duree_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.retard.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.retard.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="traffic_id">{{ trans('cruds.retard.fields.traffic') }}</label>
                <select class="form-control select2 {{ $errors->has('traffic') ? 'is-invalid' : '' }}" name="traffic_id" id="traffic_id" required>
                    @foreach($traffic as $id => $traffic)
                        <option value="{{ $id }}" {{ old('traffic_id') == $id ? 'selected' : '' }}>{{ $traffic }}</option>
                    @endforeach
                </select>
                @if($errors->has('traffic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('traffic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.retard.fields.traffic_helper') }}</span>
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