<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sinNombrePHP</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- css app -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">

    </head>
    <body class="home">
        <header class="home__header">
            <div class="container">
                <div class="w-100 d-flex justify-content-between">
                    <div class="home__header__logo">
                    <h1>sinNombrePHP</h1>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="hero" style="background-image: url({{asset('images/homeBG.gif')}})">
                <div class="container">
                    <div class="hero__content">
                        <h1><span>Campus Virtual sinNombrePHP</span></h1>

                        <ul>
                            <li>Regístrate para acceder a tu área de usuario.</li>
                            <li>Utiliza las notificaciones para recibir información del profesorado.</li>
                            <li>Consulta los datos de tu perfil y modifícalos en caso de ser necesario.</li>
                        </ul>
                        <div class="hero__buttons">
                            @if (Route::has('login'))
                                @auth
                                    <a class="btn btn-outline-success" href="{{ url('/Entrar') }}" class="text-sm text-gray-700 underline">Home</a>
                                @else
                                    <a class="btn btn-outline-success" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                    @if (Route::has('register'))
                                        <a class="btn btn-outline-success" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                <div>
            </section>
            <section class="last_news">
            <section>
        </main>
    </body>
</html>
