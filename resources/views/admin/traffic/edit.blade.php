@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.traffic.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.traffic.update", [$traffic->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sortie">{{ trans('cruds.traffic.fields.sortie') }}</label>
                <input class="form-control timepicker {{ $errors->has('sortie') ? 'is-invalid' : '' }}" type="text" name="sortie" id="sortie" value="{{ old('sortie', $traffic->sortie) }}">
                @if($errors->has('sortie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sortie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.traffic.fields.sortie_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.traffic.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ ($traffic->user ? $traffic->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.traffic.fields.user_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
