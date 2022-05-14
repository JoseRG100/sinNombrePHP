@extends('layouts.app')
@section('title', 'Indice Cursos')
@section('content')


<h1>Espacio de usuarios del Centro</h1>
<ul>
    @foreach ($users as $user)
    <li>
        <a href="{{route('user.show', $user)}}">{{$user->name}}</a>
    </li>

    @endforeach
</ul>
{{$users->links()}}

@endsection
