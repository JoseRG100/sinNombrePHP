@extends('layouts.app')
@section('title', 'Muestra la clase')

@section('template_title')
    {{ $schedule->name ?? 'Show Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('schedules.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Class:</strong>
                            {{ $schedule->id_class }}
                        </div>
                        <div class="form-group">
                            <strong>Time Start:</strong>
                            {{ $schedule->time_start }}
                        </div>
                        <div class="form-group">
                            <strong>Time End:</strong>
                            {{ $schedule->time_end }}
                        </div>
                        <div class="form-group">
                            <strong>Day:</strong>
                            {{ $schedule->day }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
