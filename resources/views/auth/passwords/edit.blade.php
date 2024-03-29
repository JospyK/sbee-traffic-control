@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.change_password') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("profile.password.update") }}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Nouveau {{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                    name="password" id="password" required>
                @if($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="title">Confirmer le nouveau
                    {{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                    required>
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
