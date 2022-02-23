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
                    <td rowspan="3" colspan="2"><img src="{{asset('/img/logo.png')}}" width="190"></td>
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

    <div class="container col-10">
        <table>
            <tbody>
                <tr>
                    <th colspan="5" rowspan="2">Datos del Encargado Operativo</th>
                    <th colspan="2">turno</th>
                </tr>
                <tr>
                    <td><b>Mañana</b></td>
                    <td><b>Tarde</b></td>
                </tr>
                @foreach ($datosu as $user)
                <tr>
                    <td><b>Nombre</b></td>
                    <td colspan="4"><b>{{$user->name}}</b></td>
                    <td>x</td>
                    <td>x</td>
                </tr>

                <tr>
                    <td><b>Oficina</b></td>
                    <td colspan="6"><b>{{$user->agencia}}</b></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <br>
    <div class="container col-12">
        <table>

            <thead class="thead">
                <tr>
                    <th>Lista de temperatura y humedad fuera de los parametros establecidos. </th>
                </tr>
            </thead>

        </table>
    </div>
    <br>
    <br>

    <div class="container col-12">
        <table>

            <thead class="thead">
                <tr>
                    <th>fecha</th>
                    <th>Agencia</th>
                    <th>encargadoop.</th>
                    <th>Temp.</th>
                    <th>Humedad</th>
                    <th>Filtracion</th>
                    <th>UPS</th>
                    <th>Observaciones</th>


                </tr>
            </thead>

            <tbody>
                @foreach( $bitacoras as $bitacora)
                <tr>
                    <td>{{ $bitacora->fecha }}</td>
                    <td>{{ $bitacora->agencia }}</td>
                    <td>{{ $bitacora->encargadoop }}</td>
                    <td>{{ $bitacora->temperatura}}</td>
                    <td>{{ $bitacora->humedad }}</td>
                    <td>{{ $bitacora->filtracion }}</td>
                    <td>{{ $bitacora->UPS }}</td>
                    <td>{{ $bitacora->observaciones }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <br>



</body>

</html>