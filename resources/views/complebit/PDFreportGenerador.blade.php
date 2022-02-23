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
                    <th colspan="3">Birtacora de Control de Generadores</th>
                </tr>
                <tr>
                    <td><b>Código: </b>------</td>
                    <td><b>Version: </b> ----</td>
                    <td><b>Vigente: </b> -------</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Normativa a la que pertenece: </b> ------------------------------------------------</td>

                </tr>
            </tbody>
        </table>
    </div>

    <br><br><br><br> <br>


@if ($vr == 1)
   <div class="container col-10">
        <table>
            <tbody>
                <tr>
                    <th colspan="5" rowspan="2">Datos del Encargado</th>
                    <th colspan="2">turno</th>
                </tr>
                <tr>
                    <td><b>Mañana</b></td>
                    <td><b>Tarde</b></td>
                </tr>
               
                <tr> 
                    @foreach ( $datosu as $du)
                    <td><b>name</b></td>
                    <td colspan="4"><b>{{ $du->name }}</b></td>
                    <td>x</td>
                    <td>x</td>
                    @endforeach
                </tr>

                <tr>
                @foreach ( $datosu as $du)
                    <td><b>Oficina</b></td>
                    <td colspan="6"><b>{{$du->agencia}}</b></td>
                    @endforeach
                </tr>
           

            </tbody>
        </table>
    </div> 
@endif

    <br>

    <!-- RESUMEN GENERAL DE BITACORAS -->


    <div class="container col-12">


        <table>

            <thead class="thead">
                <tr>
                    <th>fecha</th>
                    <th>Tiempo (min.)</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Agencia</th>
                    <th>Encargado OP.</th>

                    <th>Observaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($all as $al)
                <tr>
                    <td>{{$al->fecha}}</td>
                    <td>{{$al->tiempo}}</td>
                    <td>{{$al->marca}}</td>
                    <td>{{$al->modelo}}</td>
                    <td>{{$al->agencia}}</td>
                    <td>{{$al->encargadoop}}</td>
                    <td>{{$al->observaciones}}</td>
                    @endforeach

                </tr>



            </tbody>
        </table>
    </div>
    @if ($vr == 0)

    <div class="page-break"></div>


    <p>

    <h5>Resumen de bitácoras de todas las agencias del mes de {{$mesDesc}}</h5>
    </p>
    <br>
    <div class="container col-5">
        <table>
            <thead>
                <tr>
                    <th>Ubicacion</th>
                    <th>Recibidos</th>
                    <th>Porcentaje (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rfn as $fn)
                <tr>
                    <td>{{$fn->agencia}}</td>

                    <td>{{$fn->total}}</td>

                    @if ($fn->total >= 1 )
                    <td> 100% </td>
                    @else
                    <td>0%</td>
                    @endif
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>
    @else

    @endif


</body>

</html>