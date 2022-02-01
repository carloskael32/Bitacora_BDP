@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
@if (Auth::user()->acceso == "no")
@php
$datos = Arr::pluck($meses,'result','mes');
@endphp
@endif
@section ('title','Reporte Bitacora')


<br>

<div class="card shadow">
    <div class="card-header bg-light">
        <h5 class="text-center"><b>Reporteria del Centro de Procesamiento de Datos - CPD </b></h5>
    </div>
    <div class="card-body">

        <!-- Tabla datos -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    @if (Auth::user()->acceso == "yes")
                    <div class="">

                        <div class="card border border-cyan">
                            <div class="card-head text-center bg-cyan p-2">
                                reporte mensual de todas las agencias
                            </div>
                            <div class="card-body">
                                <!-- Generar reporte general  -->
                                <form action="{{ route('PDFAll')}}" method="GET">

                                    <div class="mb-3">

                                        <input name="mes" type="month" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                                    </div>
                                    <!-- Alerta de consultas por mes en todas las agencias -->
                                    @if(Session::has('mensajeall'))
                                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                                        <b> <i class="fas fa-exclamation-circle"></i> {{ Session::get('mensajeall')}}</b>
                                        <button type="button" class="close bg-danger" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <input class="btn btn-sm btn-flat  bg-gradient-info" type="submit" value="Generar Reporte">
                                    </div>

                                </form>
                            </div>
                        </div>
                        <hr>
                        <br>

                        <!-- Genera reportes segun agencia y mes -->
                        @if(Session::has('mensaje'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('mensaje')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <h4 class="text-center">Reportes por Mes</h4>
                        <form action="{{ route('PDFBitacorareporte')}}" method="GET">
                            <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                            <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="buscar..." required>
                            <datalist name="agencia" id="datalistOptions">

                                @foreach($agencias as $agencia)
                                <option value="{{ $agencia->agencia }}">
                                    @endforeach

                            </datalist>
                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Mes: </label>
                                <input name="mes" type="month" class="form-control" id="formGroupExampleInput" placeholder="Ejemplo: enero 2021" required>
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <input class="btn btn-primary" type="submit" value="Generar Reporte">
                            </div>

                        </form>

                        <hr>
                        <br>


                        <!-- GENERA REPORTE CON INTERVALOS DE FECHAS-->
                        @if(Session::has('mensaje2'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('mensaje2')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif



                        <h4 class="text-center">Reporte con Intervalos
                            <br>
                            de Fechas
                        </h4>
                        <form action="{{ route('PDFBitacorareporte2')}}" method="GET">
                            <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                            <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="buscar..." required>
                            <datalist name="agencia" id="datalistOptions">

                                @foreach($agencias as $agencia)
                                <option value="{{ $agencia->agencia }}">
                                    @endforeach

                            </datalist>
                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">De: </label>
                                <input name="date1" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Hasta: </label>
                                <input name="date2" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <input class="btn btn-primary" type="submit" value="Generar Reporte">
                            </div>

                        </form>

                    </div>
                    @else


                    <div class="card border border-cyan">

                        <div class="card-head text-center bg-cyan p-2">
                            Reporte por Intervalos
                            <br>
                            de Fechas
                        </div>
                        <div class="card-body">

                            <form action="{{ route('PDFBitacorareporte2')}}" method="GET">
                                <label for="exampleDataList" class="form-label">Su Agencia es: </label>
                                <input name="agencia" class="form-control" value="{{Auth::user()->agencia}}" id="exampleDataList" readonly>
                                <br>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">De: </label>
                                    <input name="date1" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Hasta: </label>
                                    <input name="date2" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <input class="btn btn-sm btn-flat  bg-gradient-info" type="submit" value="Generar Reporte">
                                </div>
                            </form>
                        </div>



                        <div class="card-footer border border-cyan text-center bg-ligth">
                            BDP-SAM
                        </div>
                    </div>
                    @endif
                    @if(Session::has('mensaje2'))
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                        <b> <i class="fas fa-exclamation-circle"></i> {{ Session::get('mensaje2')}}</b>
                        <button type="button" class="close bg-danger" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                </div>



                <div class="col-md-9">


                    @auth
                    @if (Auth::user()->acceso == "yes")
                    <h5 class="text-center">Bitacoras registradas el dia Hoy.. <b>{{ date('Y-m-d') }} </b></h5>
                    <hr>
                    <table class=" table table-light">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Agencia</th>
                                <th>EncargadoOP.</th>
                                <th>Temperatura</th>
                                <th>Humedad</th>
                                <th>Filtracion</th>
                                <th>UPS</th>
                                <th>Generador</th>
                                <th>Observaciones</th>
                                <th>Fecha</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach( $bitacoras as $bitacora)
                            <tr>

                                <td>{{ $bitacora->id }}</td>
                                <td>{{ $bitacora->agencia }}</td>
                                <td>{{ $bitacora->encargadoOP }}</td>
                                <td>{{ $bitacora->temperatura }}</td>
                                <td>{{ $bitacora->humedad }}</td>
                                <td>{{ $bitacora->filtracion }}</td>
                                <td>{{ $bitacora->UPS }}</td>
                                <td>{{ $bitacora->generador }}</td>
                                <td>{{ $bitacora->observaciones }}</td>
                                <td>{{ $bitacora->Fecha }}</td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="pagination justify-content-center">

                        {!! $bitacoras->links() !!}

                    </div>

                    @else

                    <div class="card">

                        <div class="card-body">
                            <div class="row">

                                @if (!empty($datos[1]))
                                @php

                                $a = $datos[1];
                                $dias = implode($dmes[0]);
                                $b = round(($a*100)/$dias);
                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Enero</b></spam>
                                        </div>
                                        <div class="text-center">

                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a }} </h2>

                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="1">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Enero">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-3">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Enero</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-2">
                                            <h5>No se envio ningun reporte.!! </h5>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if (!empty($datos[2]))
                                @php

                                $a = $datos[2];
                                $dias = implode($dmes[1]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Febrero</b></spam>
                                        </div>
                                        <div class="text-center">

                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>

                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="2">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Febrero">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Febrero</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if (!empty($datos[3]))
                                @php

                                $a = $datos[3];
                                $dias = implode($dmes[2]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Marzo</b></spam>
                                        </div>
                                        <div class="text-center">

                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>

                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="3">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Marzo">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Marzo</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if (!empty($datos[4]))
                                @php

                                $a = $datos[4];
                                $dias = implode($dmes[3]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Abril</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="4">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Abril">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Abril</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>


                            <hr>

                            <div class="row">

                                @if (!empty($datos[5]))
                                @php

                                $a = $datos[5];
                                $dias = implode($dmes[4]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Mayo</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="5">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Mayo">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Mayo</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if (!empty($datos[6]))
                                @php

                                $a = $datos[6];
                                $dias = implode($dmes[5]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Junio</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="6">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Junio">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Junio</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif



                                @if (!empty($datos[7]))
                                @php

                                $a = $datos[7];
                                $dias = implode($dmes[6]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Julio</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="7">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Julio">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Julio</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if (!empty($datos[8]))
                                @php

                                $a = $datos[8];
                                $dias = implode($dmes[7]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Agosto</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="8">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Agosto">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Agosto</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <hr>

                            <div class="row">

                                @if (!empty($datos[9]))
                                @php

                                $a = $datos[9];
                                $dias = implode($dmes[8]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Septiembre</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="9">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Septiembre">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Septiembre</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if (!empty($datos[10]))
                                @php

                                $a = $datos[10];
                                $dias = implode($dmes[9]);



                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Octubre</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="10">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Octubre">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Octubre</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif



                                @if (!empty($datos[11]))
                                @php

                                $a = $datos[11];

                                $dias = implode($dmes[10]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Noviembre</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="11">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Noviembre">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Noviembre</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif



                                @if (!empty($datos[12]))
                                @php

                                $a = $datos[12];
                                $dias = implode($dmes[11]);
                                $b = round(($a*100)/$dias);

                                if( $b >= 100){
                                $b=100;
                                }
                                @endphp

                                <div class="col-md-3">
                                    <div class="card border p-2 mx-sm-1 shadow ">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                        </div>
                                        <div class="text-center">
                                            <spam><b>Diciembre</b></spam>
                                        </div>
                                        <div class="text-center">
                                            <spam>Reportes enviados</spam>
                                            <h2>{{ $a}} </h2>
                                            <form action="{{ route('reportBit')}}" method="GET">
                                                <div>
                                                    <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="12">
                                                    <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Diciembre">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <input class="btn btn-xs btn-flat btn-success bg-gradient-success" type="submit" value="Descargar Reporte">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @else
                                <div class="col-md-3">
                                    <div class="card border mx-sm-1 p-2">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                        </div>
                                        <div class="text-danger text-center mt-3">
                                            <spam><b>Diciembre</b></spam>
                                        </div>
                                        <div class="text-danger text-center mt-4">
                                            <spam>No se envio ningun reporte.!! </spam>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </div>


        @endif

        @endauth

    </div>
</div>







@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop