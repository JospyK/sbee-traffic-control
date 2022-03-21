@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Générer un état
    </div>

    <div class="card-body">
        <form autocomplete="off" action="{{ route('admin.etats.generate') }}" method="POST" role="form">
            @csrf
            <div class="row">
                {{-- <div class="col-sm-6">
                    <div class="form-group">
                        <label for="prime">Date de debut</label>
                        <input required type="date" class="form-control" id='datetimepicker4' name="debut"
                            placeholder="date de debut">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="prime">Date de fin</label>
                        <input required type="date" class="form-control" id="fin" name="fin" placeholder="Date de fin">
                    </div>
                </div> --}}
                <div class="col-sm-12">
                    <div class="form-group">
                        <select name="etat" id="etat" class="form-control" required>
                            <option value="" selected disabled>Selectionnez votre etat</option>
                            <option value="liste_traffic">Liste des trafics</option>
                            <option value="traffic_agent">Trafics par utilisateur</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Générer état" class=" mx-auto btn btn-info btn-lg">
            </div>
        </form>
    </div>
</div>

@endsection
