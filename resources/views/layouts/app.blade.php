<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Bitacora BDP</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        * {

            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
    </style>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav nav-tabs">
                        @auth
                        @if (Auth::user()->acceso == "yes")

                        <li class="nav-item">
                            <a class="nav-link {{ isset($tapin)?$tapin:old('') }}" href="{{ route('home') }}">{{ __('Inicio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ isset($tapal)?$tapal:old('') }}" href="{{ route('alertas') }}">{{ __('Alertas') }}</a>

                        </li>
                        <!--   <li class="nav-item">
                            <a class="nav-link" href="{{ route('reportes') }}">{{ __('Reportes') }}</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Reportes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('reportes') }}">Reporte de Bitacoras</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reportesge') }}">Reporte de Generadores</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Usuarios</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user') }}">Administradores</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('eno') }}">Encargados Operativos</a></li>
                            </ul>
                        </li>




                        <!--        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eno') }}">{{ __('Encargados Operativos') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">{{ __('Administrador') }}</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link  {{ isset($tapag)?$tapag:old('') }}" href="{{ route('agencia') }}">{{ __('Agencias') }}</a>
                        </li>




                        @else

                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bitacora') }}">{{ __('Bitacora') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reportes') }}">{{ __('Reportes') }}</a>
                        </li>
    -->


                        <li class="nav-item">
                            <a class="nav-link {{ isset($tapbi)?$tapbi:old('') }} " href="{{ route('bitacora') }}">{{ __('Bitacora') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ isset($tapge)?$tapge:old('') }}" href="{{ route('generador') }}">{{ __('Generador') }}</a>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Reportes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('reportes') }}">Reporte de Bitacoras</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reportesge') }}">Reporte de Generadores</a></li>
                            </ul>
                        </li>

                    </ul>



                    @endif
                    @endauth


                    </ul>

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

                        <!--             @if (Auth::user()->acceso == 'no')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/eno/'.Auth::user()->id.'/edit') }}">{{ __('Cambio de Contraseña') }}</a>
                        </li>
                        @endif
 -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->user }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout.destroy') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout.destroy') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


    </div>
    <main class="py-4">
        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>