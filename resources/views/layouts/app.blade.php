<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Campus Virtual - sinNombrePHP </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- css app -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-tooltip@3.1.1/index.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Full Calendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css">

</head>

<body>
    <div id="app" class="wrapper">
        @auth
        <?php
            if (Auth::user()->tipo != 2){
        ?>
        <nav id="sidebar" class="sidebar">
            <div class="sidebar__header">
                <h3>Panel de usuarios</h3>
            </div>
            <ul class="list-unstyled components">
                @auth
                    {{-- <a class="navbar-brand" href="{{ url('/courses') }}">
                        {{ config('Cursos', 'Cursos') }}
                    </a> --}}
                    <li class="{{ (request()->is('user')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/user') }}">
                            {{ config('Usuarios', 'Usuarios') }}
                        </a>
                    </li>
                    {{-- <a class="navbar-brand" href="{{ url('/asignaturas') }}">
                        {{ config('Asignaturas', 'Asignaturas') }}
                    </a> --}}
                    <li class="{{ (request()->is('schedules')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/schedules') }}">
                            {{ config('Clases', 'Clases') }}
                        </a>
                    </li>
                    <li class="{{ (request()->is('exams')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/exams') }}">
                            {{ config('Exámenes', 'Exámenes') }}
                        </a>
                    </li>
                    <li class="{{ (request()->is('works')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/works') }}">
                            {{ config('Trabajos', 'Trabajos') }}
                        </a>
                    </li>
                    <li class="{{ (request()->is('enrollment')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/enrollment') }}">
                            {{ config('Inscripción', 'Inscripción') }}
                        </a>
                    </li>
                    <li class="{{ (request()->is('percentage')) ? 'active' : '' }}">
                        <a class="navbar-brand" href="{{ url('/percentage') }}">
                            {{ config('Porcentaje', 'Porcentaje') }}
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        <?php
            }
        ?>
        @endauth
        <main>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px-5">
                <div class="w-100 d-flex justify-content-between">
                    {{-- link a crear cursos solo para administrador --}}
                    @auth
                        <div>
                            <a class="navbar-brand" href="{{ url('/courses') }}">
                                {{ config('Cursos', 'Cursos') }}
                            </a>

                            <a class="navbar-brand" href="{{ url('/asignaturas') }}">
                                {{ config('Asignaturas', 'Asignaturas') }}
                            </a>

                            <a class="navbar-brand" href="{{ url('/calendar') }}">
                                {{ config('Calendario', 'Calendario') }}
                            </a>
                        </div>

                    @endauth
                    <div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else

                                    <a href="{{ route('mensaje') }}" class="nav-link dropdown">Enviar mensaje</a>
                                    <a href="{{ route('notifications.index') }}" class="nav-link dropdown">Notificaciones
                                        @if ($count = Auth::user()->unreadNotifications->count())
                                            <span class="bange"> <strong>{{ $count }}</strong> </span>
                                        @endif
                                    </a>



                                    <li class="nav-item dropdown">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            {{-- link al perfil del usuario --}}
                                            <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">
                                                {{-- Link a editar el perfil autenticado --}}
                                                Mi perfil
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            @if (session()->has('flash'))
                <div class="container px-5">
                    <div class="alert alert-success">{{ session('flash') }}</div>
                </div>
            @endif
            <div class="content py-4 px-5">
                @yield('content')
            </div>
        </main>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"
        integrity="sha512-0fcCRl828lBlrSCa8QJY51mtNqTcHxabaXVLPgw/jPA5Nutujh6CbTdDgRzl9aSPYW/uuE7c4SffFUQFBAy6lg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/locale/es.min.js"
        integrity="sha512-OXy30agOq/KkLVI1lickBn2JCJGlTxoTWXUGEpgrD8XhWG8cuZOHfySxm5cuUo94BwLT7cJ9qAmP1Am93j6IWg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
