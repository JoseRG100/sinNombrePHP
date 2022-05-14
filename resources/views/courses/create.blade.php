@extends('layouts.app')
@section('title', 'Crear Curso')

@section('content')

<h1>Crear cursos</h1>



<form  action="{{route('courses.store')}}" method="POST">

    @csrf
    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name')}}">
    </label>

    @error('name')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror
    <br>
    <label>
        Descripción: <br>
        <input type="text" name="description" value="{{old('description')}}">

    </label>
    @error('description')
    <br>
    <small>*{{$message}}</small>
    <br>

@enderror
    <br>
    <label>
        Fecha de inicio:
        <br>
        <input type="date" name="date_start" value="{{old('date_start')}}">

    </label>
    @error('date_start')
    <br>
    <small>*{{$message}}</small>
    <br>

@enderror

<br>
    <label>
        Fecha Final:
        <br>
        <input type="date" name="date_end" value="{{old('date_end')}}">

    </label>
    @error('date_end')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <label>
        Activo:
        <br>
        <input type="text" name="active" value="{{old('active')}}">
    </label>

    @error('active')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror
    <br>

    <br>
    <button type="submit">Enviar formulario</button>

</form>

@endsection
