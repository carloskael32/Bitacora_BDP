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

    @php

    for ($i = 0; $i < count($all); $i++) { $j=0; 
        @endphp 
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
                        <td colspan="4"><b>{{$all[$i][$j]->encargadoOP}}</b></td>
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
                    @php
                    for ($j = 0; $j < count($all[$i]); $j++) { 
                        @endphp 
                        <tr>
                        <td>{{$all[$i][$j]->Fecha}}</td>
                        <td>{{$all[$i][$j]->agencia}}</td>
                        <td>{{$all[$i][$j]->encargadoOP}}</td>
                        <td>{{$all[$i][$j]->temperatura}}</td>
                        <td>{{$all[$i][$j]->humedad}}</td>
                        <td>{{$all[$i][$j]->filtracion}}</td>
                        <td>{{$all[$i][$j]->UPS}}</td>
                        <td>{{$all[$i][$j]->observaciones}}</td>
                        </tr>

                        @php
                        }
                        @endphp

                </tbody>
            </table>
        </div>


        <div class="page-break"></div>
        @php

        }

        @endphp

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
                    @foreach ($bitto as $bt)
                    <tr>
                    <td>{{$bt->agencia}}</td>
                
                    <td>{{$bt->total}}</td>

             
                    <td>s</td>
                    </tr>
                  
                    @endforeach
                </tbody>

            </table>
        </div>

</body>

</html>