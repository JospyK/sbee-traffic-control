@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.traffic.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.traffic.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label class="required" for="user_id">{{ trans('cruds.traffic.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                        <option value="" selected>Selectionnez l'agent</option>
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    {{-- <span class="help-block">{{ trans('cruds.traffic.fields.user_helper') }}</span> --}}
                </div>
                <div class="form-group col-6">
                    <label for="temperature">{{ trans('cruds.traffic.fields.temperature') }}</label>
                    <input class="form-control {{ $errors->has('temperature') ? 'is-invalid' : '' }}" type="number" name="temperature" id="temperature" value="{{ old('temperature', '') }}" step="0.01" min="10" max="99" inputmode="numeric" required>

                    @if($errors->has('temperature'))
                        <div class="invalid-feedback">
                            {{ $errors->first('temperature') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.traffic.fields.temperature_helper') }}</span>
                </div>

            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- <script src=""></script>
<script>
    new AutoNumeric('#3357', 'numeric');

    maximumValue: "100",
    minimumValue: "10",
    outputFormat: AutoNumeric.options.outputFormat.dot,
    styleRules: AutoNumeric.options.styleRules.range0To100With4Steps

</script> --}}


@endsection
