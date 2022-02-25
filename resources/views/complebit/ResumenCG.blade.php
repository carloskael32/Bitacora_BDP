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

    <main>
        
        <!-- RESUMEN GENERAL DE BITACORAS -->
        <h5>Resumen de registros de "CPD" de todas las agencias.</h5>
        <h3 class="text-center">{{$mesDesc}}</h3>
    

        <div class="container col-7">
            <table>
                <thead>
                    <tr>
                        <th>Agencia</th>
                        <th>Recibidos</th>
                        <th>Porcentaje (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rfn as $bt)
                    <tr>
                        <td>{{$bt->agencia}}</td>

                        <td>{{$bt->total}}</td>

                        <td>{{$bt->porcentaje }}</td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <hr>
        <br>
                <!-- RESUMEN GENERAL DE GENERADORES -->
                <h5>Resumen de pruebas de generador de todas las agencias.</h5>
        <h3 class="text-center">{{$mesDesc}}</h3>

        <div class="container col-12">
            <table>
                <thead>
                    <tr>
                        <th>Agencia</th>
                        <th>fecha de prueba</th>
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