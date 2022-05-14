@extends('layouts.app')
@section('title', 'Tu mensaje')

@section('content')

<h1>Mensaje</h1>
<p>{{$message->body}}</p>
<small>Enviado por {{$message->sender->name}}</small>



@endsection
