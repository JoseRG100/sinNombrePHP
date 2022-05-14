@extends('layouts.app')
@section('title', 'Tus notificaciones')

@section('content')
<div class="container">
    <h1>Notificaciones</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>No leídas</h2>
            <div class="list-group">
            @foreach ($unreadNotifications as $unreadNotification)
                <li class="list-group-item">
                    <a href="{{$unreadNotification->data['link']}}">
                        {{$unreadNotification->data['text']}}
                    </a>

                    <form method="POST" action="{{route('notifications.read', $unreadNotification->id)
                    }}" class="pull-right">
                        {{method_field('PATCH')}}
                        @csrf
                        <button class="btn btn-danger btn-xs">Marcar como leída</button>

                    </form>
                </li>
            @endforeach
        </div>
        </div>
        <div class="col-md-6">
            <h2>Leídas</h2>
            <div class="list-group">
                @foreach ($readNotifications as $readNotification)
                <li class="list-group-item">
                    <a href="{{$readNotification->data['link']}}">
                        {{$readNotification->data['text']}}
                    </a>
                    <form method="POST" action="{{route('notifications.destroy', $readNotification->id)
                    }}" class="pull-right">
                        {{method_field('DELETE')}}
                        @csrf
                        <button class="btn btn-danger btn-xs">Eliminar</button>

                    </form>


                </li>
            @endforeach
            </div>
        </div>
    </div>

</div>



@endsection


