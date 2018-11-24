<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body>


        <div id="app">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>





                <main class="py-4">
                    @yield('content')
                </main>
            </div>

        <div class="wrapper">


                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                    <a href="{{Route('home')}}">   <h3>{{ config('app.name', 'Laravel') }}</h3></a>
                    </div>

                    <ul class="list-unstyled components">
                        <p>Operaciones</p>{{--Cambiar dependiendo del rol--}}

                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Insumos</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="">Ver</a>
                                </li>
                                <li>
                                <a href="">Agregar</a>
                                </li>

                            </ul>
                        </li>


                        <li class="active">
                                <a href="#habilidadesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
                                <ul class="collapse list-unstyled" id="habilidadesSubmenu">
                                    <li>
                                        <a href="">Ver</a>
                                    </li>
                                    <li>
                                    <a href="">Agregar</a>
                                    </li>

                                </ul>
                            </li>

                            <li>

                            <a href="#proyectosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proovedores</a>
                            <ul class="collapse list-unstyled" id="proyectosSubmenu">
                                <li>
                                <a href="">Ver</a>
                                </li>

                                <li>
                                    <a href="">Agregar</a>
                                </li>


                            </ul>
                            <a href="#asignacionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ordenes de compra</a>
                            <ul class="collapse list-unstyled" id="asignacionSubmenu">
                                <li>
                                <a href="">Ver</a>
                                </li>
                                <li>
                                    <a href="">Agregar</a>
                                </li>

                            </ul>


                        </li>

                    </ul>



                </nav>




    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</body>
</html>
