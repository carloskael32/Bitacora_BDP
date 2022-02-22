<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section ('title','Reportes')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilospdf.css') }}">
</head>

<body>
    <!--     <header>
        <div class="container col-12">
            <table>
                <tbody>
                    <tr>
                        <td rowspan="3" colspan="2"><img src="{{asset('/img/logo.png')}}" width="200"></td>
                        <th colspan="3">Birtacora de Control de CPD</th>
                    </tr>
                    <tr>
                        <td><b>Código: </b> 10-A06-02-219</td>
                        <td><b>Version: </b> 1.0</td>
                        <td><b>Vigente: </b> 24/05/2021</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Normativa a la que pertenece: </b> Manual de Procedimientos del Centro de Procesamiento de Datos</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header> -->

    <main>

        <!-- RESUMEN GENERAL DE BITACORAS -->
        <h5>Resumen de pruebas de generador de todas las agencias.</h5>
        <h3 class="text-center">{{$mesDesc}}</h3>

        <div class="container col-12">
            <table>
                <thead>
                    <tr>
                        <th>Agencia</th>
                        <th>Fecha de prueba</th>
                        <th>Observaciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($generador as $bt)
                    <tr>
                        <td>{{$bt->agencia}}</td>
                        <td>{{$bt->fecha}}</td>
                        <td>{{$bt->observaciones}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </main>

</body>

</html>