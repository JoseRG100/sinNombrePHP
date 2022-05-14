@extends('layouts.app')

@section('title', 'Crea una asignatura')

@section('template_title')
    Create Asignatura
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Asignatura</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asignaturas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asignatura.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
