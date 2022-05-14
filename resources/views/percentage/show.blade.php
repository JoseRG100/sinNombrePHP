@extends('layouts.app')

@section('template_title')
    {{ $percentage->name ?? 'Show Percentage' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Porcentaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success
" href="{{ route('percentage.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Course:</strong>
                            {{ $percentage->id_course }}
                        </div>
                        <div class="form-group">
                            <strong>Id Class:</strong>
                            {{ $percentage->id_class }}
                        </div>
                        <div class="form-group">
                            <strong>Continuous Assessment:</strong>
                            {{ $percentage->continuous_assessment }}
                        </div>
                        <div class="form-group">
                            <strong>Exams:</strong>
                            {{ $percentage->exams }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
