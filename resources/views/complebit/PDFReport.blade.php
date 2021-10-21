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
    <header>
        <p>PDF con DOMPDF 8</p>
    </header>

    <div class="container col-11">



        <table class="table table-striped table-hover">

            <thead class="thead">
                <tr>

                    <th>Agencia</th>
                    <th>EncargadoOP.</th>
                    <th>Temp.</th>
                    <th>Humedad</th>
                    <th>Filtracion</th>
                    <th>UPS</th>
                   
                    <th>Observaciones</th>
                    <th>Fecha</th>

                </tr>
            </thead>

            <tbody>
                @foreach( $bitacoras as $bitacora)
                <tr>


                    <td>{{ $bitacora->agencia }}</td>
                    <td>{{ $bitacora->EncargadoOP }}</td>
                    <td>{{ $bitacora->Temperatura }}</td>
                    <td>{{ $bitacora->Humedad }}</td>
                    <td>{{ $bitacora->Filtracion }}</td>
                    <td>{{ $bitacora->UPS }}</td>
                  
                    <td>{{ $bitacora->Observaciones }}</td>
                    <td>{{ $bitacora->Fecha }}</td>


                </tr>
                @endforeach
            </tbody>

        </table>


    </div>


</body>




</html>