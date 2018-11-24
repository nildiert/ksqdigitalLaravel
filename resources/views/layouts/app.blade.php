

<!DOCTYPE html>
<html>

<head>
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
</head>

<body onload="myFunction()" style="margin:0;" >

        

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
                                <a href="{{Route('insumos.index')}}">Ver</a>
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

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>

{{--AUTENTICACION--}}
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
            <li class="nav-item ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Cerrar sesión') }}
                     </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>

{{--FIN AUTENTICACIÓN--}}                        

                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->


    <script>
            var myVar;

            
            
            function myFunction() {
                myVar = setTimeout(showPage, 100);
            }
            
            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
            </script>

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



            

