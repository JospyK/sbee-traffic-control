@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Tableau de board
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ $entrees }}</div>
                                    <div>Entrées de la journée</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ $sorties }}</div>
                                    <div>Sorties de la journée</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="{{ $chart->options['column_class'] }}">
                            <h3>{!! $chart->options['chart_title'] !!}</h3>
                            {!! $chart->renderHtml() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $chart->renderJs() !!}
@endsection
