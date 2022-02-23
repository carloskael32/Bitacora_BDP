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



    @for ($i = 0; $i < count($all); $i++)
     @if ($all[$i] !=null) 
     @php 
     $j=0; 
     @endphp <!-- cabecera -->
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



        <div class="container col-10">
            <table>
                <tbody>
                    <tr>
                        <th colspan="5" rowspan="2">Datos de los Encargados</th>
                        <th colspan="2">turno</th>
                    </tr>
                    <tr>
                        <td><b>Mañana</b></td>
                        <td><b>Tarde</b></td>
                    </tr>

                    <tr>
                        <td><b>Nombre</b></td>
                        <td colspan="4"><b>{{$all[$i][$j]->name}}</b></td>
                        <td>x</td>
                        <td>x</td>
                    </tr>

                    <tr>
                        <td><b>Oficina</b></td>
                        <td colspan="6"><b>{{$all[$i][$j]->agencia}}</b></td>
                    </tr>


                </tbody>
            </table>
        </div>


        <br>

        <!-- RESUMEN GENERAL DE BITACORAS -->


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

                    @for ($j = 0; $j < count($all[$i]); $j++) <tr>
                        <td>{{$all[$i][$j]->fecha}}</td>
                        <td>{{$all[$i][$j]->agencia}}</td>
                        <td>{{$all[$i][$j]->encargadoop}}</td>
                        <td>{{$all[$i][$j]->temperatura}}</td>
                        <td>{{$all[$i][$j]->humedad}}</td>
                        <td>{{$all[$i][$j]->filtracion}}</td>
                        <td>{{$all[$i][$j]->UPS}}</td>
                        <td>{{$all[$i][$j]->observaciones}}</td>
                        </tr>

                        @endfor

                </tbody>
            </table>
        </div>

        <div class="page-break"></div>
        @endif

        @endfor

        <div class="container col-11">
            <div>
                <table>
                    <thead class="thead">
                        <tr>
                            <th colspan="7">Reporte Generadores</th>
                        </tr>
                        <tr>
                            <th>agencia</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cod_activo</th>
                            <th>Num_serie</th>
                            <th>fecha de prueba</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($generador !=null)
                        @foreach ($generador as $gen)
                        <tr>
                            <td>{{ $gen->agencia }}</td>
                            <td>{{ $gen->marca }}</td>
                            <td>{{ $gen->modelo }}</td>
                            <td>{{ $gen->cod_activo }}</td>
                            <td>{{ $gen->num_serie }}</td>
                            <td>{{ $gen->fecha }}</td>
                            <td>{{ $gen->observaciones }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">no se realizo las pruebas con el generador este mes.</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
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

</body>

</html>