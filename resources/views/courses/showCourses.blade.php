@extends('layouts.app')
@section('title', 'Muestra cursos')

@section('template_title')
    {{ $course->name ?? 'Show Course' }}
@endsection




@section('content')

    <h2>Bienvenido al curso: {{$course->name}} </h2>
    <a href="{{route('courses.index')}}">Volver a cursos</a>
    <br>
    <a href="{{route('courses.edit',$course)}}">Editar curso</a>


    <p><strong>Categoría: </strong>{{$course->name}}</p>
    <p><Strong>Descripción:  </Strong>{{$course->description}}</p>
    <p><Strong>Fecha de Inicio: </Strong>{{$course->date_start}}</p>
    <p><Strong>Fecha de Fin: </Strong>{{$course->date_end}}</p>
    <p><Strong>Activo: </Strong>{{$course->active}}</p>

    <form action="{{route('courses.destroy',$course)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
