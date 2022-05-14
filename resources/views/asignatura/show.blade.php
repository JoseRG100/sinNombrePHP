@extends('layouts.app')
@section('title', 'Muestra asignaturas')

@section('template_title')
    {{ $asignatura->name ?? 'Show Asignatura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Asignatura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('asignaturas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Teacher:</strong>
                            {{ $asignatura->id_teacher }}
                        </div>
                        <div class="form-group">
                            <strong>Id Course:</strong>
                            {{ $asignatura->id_course }}
                        </div>
                        <div class="form-group">
                            <strong>Id Schedule:</strong>
                            {{ $asignatura->id_schedule }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $asignatura->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $asignatura->color }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
