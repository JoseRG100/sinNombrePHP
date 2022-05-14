@extends('layouts.app')
@section('title', $user->name)

@section('content')

    <h1>Espacio de edición de usuario</h1>



    <form action="{{route('user.update', $user)}}" method="post">

        @csrf
        @method('put')
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name', $user->name)}}">
        </label>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>

        @enderror
        <br>
        <label>
            Email: <br>
            <input type="text" name="email" value="{{old('description', $user->email)}}">

        </label>
        @error('email')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror

    <br>
        <label>
            Tipo: <br>
            <input type="text" name="tipo" value="{{old('active', $user->tipo)}}">

        </label>
        @error('tipo')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror
    <br>
    <label>
        Contraseña: <br>
        <input type="password" name="password" value="{{old('active')}}">

    </label>
    @error('password')
    <br>
    <small>*{{$message}}</small>
    <br>

@enderror


        <br>
        <button type="submit">Actualizar usuario</button>

    </form>



@endsection
