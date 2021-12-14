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
    <!-- cabecera -->
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

    <br><br><br><br><br>

   

  

    <!-- RESUMEN GENERAL DE BITACORAS -->
    

    <div class="container col-12">
        <table>
            <thead class="thead">
                <tr>
                    <th>Fecha</th>
                    <th>Agencia</th>
                    <th>EncargadoOP.</th>
                    <th>Temp.</th>
                    <th>Humedad</th>
                    <th>Filtracion</th>
                    <th>UPS</th>
                    <th>Observaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $bitall as $bit)
                <tr>
                    <td>{{ $bit->Fecha }}</td>
                    <td>{{ $bit->agencia }}</td>
                    <td>{{ $bit->encargadoOP }}</td>
                    <td>{{ $bit->temperatura }}</td>
                    <td>{{ $bit->humedad }}</td>
                    <td>{{ $bit->filtracion }}</td>
                    <td>{{ $bit->UPS }}</td>
                    <td>{{ $bit->observaciones }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
 

</body>

</html>