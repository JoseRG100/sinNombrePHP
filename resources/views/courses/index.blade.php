@extends('layouts.app')
@section('title', 'Listado de Cursos')

@section('template_title')
    Curso
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Curso') }}
                            </span>
                            <div class="float-right">
                                <a href="{{route('courses.create')}}" class="btn btn-success float-right"  data-placement="left">
                                  {{ __('Crear Curso') }}
                                </a>
                              </div>
                        </div>
                    </div>
<ul>
    @foreach ($courses as $course)
    <li>
        <a href="{{route('courses.show', $course)}}">{{$course->name}}</a>
    </li>

    @endforeach
</ul>
{{$courses->links()}}

@endsection
