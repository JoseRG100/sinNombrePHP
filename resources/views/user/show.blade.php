@extends('layouts.app')

@section('title', $user->name)


@section('content')
    <h1>Bienvenido al usuario: {{$user->name}} </h1>
    <a href="{{route('user.index')}}">Volver a Usuarios</a>
    <br>
    <a href="{{route('user.edit',$user)}}">Editar usuario</a>

    <p><strong>Categoria: </strong>{{$user->name}}</p>
    <p><Strong>Email: </Strong>{{$user->email}}</p>

    <p><Strong>Tipo: </Strong>{{$user->tipo}}</p>

    <form action="{{route('user.destroy',$user)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
