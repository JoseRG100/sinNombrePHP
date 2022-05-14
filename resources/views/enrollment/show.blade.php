@extends('layouts.app')

@section('template_title')
    {{ $enrollment->name ?? 'Show Enrollment' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar inscripción</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('enrollment.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Student:</strong>
                            {{ $enrollment->id_student }}
                        </div>
                        <div class="form-group">
                            <strong>Id Course:</strong>
                            {{ $enrollment->id_course }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $enrollment->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
