@extends('layouts.app')
@section('content')
@if (Auth::user()->acceso == "no")
@php
$dias = 20;
$datos = Arr::pluck($meses,'result','mes');
@endphp
@endif
@section ('title','Reportes')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">


            <div class="card">
                <div class="card-header">
                  
                    <h2 class="text-center">Reportes</h2>
                </div>
                <div class="card-body">



                    <!-- Tabla datos -->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-3">


                                @if(Session::has('mensaje'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ Session::get('mensaje')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif


                                <div class="card">
                                    <div class="card-header text-center">
                                        Reporte de Agencias

                                    </div>

                                    <div class="card-body">

                                        <!-- Genera reportes segun agencia y mes -->

                                        @if (Auth::user()->acceso == "yes")
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
                                            <br>


                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <input class="btn btn-primary" type="submit" value="Generar Reporte">
                                            </div>

                                        </form>

                                        <hr>
                                        <br>
                                        @if(Session::has('mensaje2'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ Session::get('mensaje2')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif


                                        <!-- Genera Reportes Segun Fechas-->

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
                                        @else

                                        <!-- Genera Reportes Segun Fechas-->

                                        <h4 class="text-center">Reporte con Intervalos
                                            <br>
                                            de Fechas
                                        </h4>

                                        <form action="{{ route('PDFBitacorareporte2')}}" method="GET">
                                            <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
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
                                                <input class="btn btn-primary" type="submit" value="Generar Reporte">
                                            </div>

                                        </form>

                                        @endif


                                    </div>

                                    <div class="card-footer text-muted text-center">
                                        BDP-SAM
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-9">


                                @auth
                                @if (Auth::user()->acceso == "yes")
                                <h5 class="text-center">Reportes Registrados Hoy..</h5>
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
                                            <td>{{ $bitacora->Agencia }}</td>
                                            <td>{{ $bitacora->EncargadoOP }}</td>
                                            <td>{{ $bitacora->Temperatura }}</td>
                                            <td>{{ $bitacora->Humedad }}</td>
                                            <td>{{ $bitacora->Filtracion }}</td>
                                            <td>{{ $bitacora->UPS }}</td>
                                            <td>{{ $bitacora->Generador }}</td>
                                            <td>{{ $bitacora->Observaciones }}</td>
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

                                        <div class="row w-100">

                                            @if (!empty($datos[1]))
                                            @php

                                            $a = $datos[1];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Enero</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="1">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Enero">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Enero</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif


                                            @if (!empty($datos[2]))
                                            @php

                                            $a = $datos[2];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Febrero</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="2">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Febrero">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Febrero</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif


                                            @if (!empty($datos[3]))
                                            @php

                                            $a = $datos[3];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Marzo</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="3">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Marzo">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Marzo</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if (!empty($datos[4]))
                                            @php

                                            $a = $datos[4];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Abril</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="4">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Abril">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Abril</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <br>
                                        <hr>
                                        <div class="row w-100">

                                            @if (!empty($datos[5]))
                                            @php

                                            $a = $datos[5];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Mayo</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="5">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Mayo">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Mayo</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if (!empty($datos[6]))
                                            @php

                                            $a = $datos[6];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Junio</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="6">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Junio">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Junio</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif



                                            @if (!empty($datos[7]))
                                            @php

                                            $a = $datos[7];
                                            $dias;
                                            $b = round(($a*100)/$dias);

                                            if( $b >= 100){
                                            $b=100;
                                            }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Julio</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }} </h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="7">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Julio">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-3">
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Julio</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif


                                            <div class="col-md-3">

                                                @if (!empty($datos[8]))
                                                @php

                                                $a = $datos[8];
                                                $dias;
                                                $b = round(($a*100)/$dias);

                                                if( $b >= 100){
                                                $b=100;
                                                }
                                                @endphp
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Agosto</h4>
                                                    </div>
                                                    <div class="text-info text-center mt-2">


                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }}</h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="8">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Agosto">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>


                                                    </div>
                                                </div>


                                                @else
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Agosto</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                        <br>
                                        <hr>

                                        <div class="row w-100">

                                            <div class="col-md-3">


                                                @if (!empty($datos[9]))
                                                @php

                                                $a = $datos[9];
                                                $dias;
                                                $b = round(($a*100)/$dias);

                                                if( $b >= 100){
                                                $b=100;
                                                }
                                                @endphp
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Septiembre</h4>
                                                    </div>

                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }}</h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="9">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Septiembre">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>

                                                        </form>



                                                    </div>

                                                </div>



                                                @else
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Septiembre</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>


                                            <div class="col-md-3">
                                                @if (!empty($datos[10]))
                                                @php

                                                $a = $datos[10];
                                                $dias;
                                                $b = round(($a*100)/$dias);

                                                if( $b >= 100){
                                                $b=100;
                                                }
                                                @endphp
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Octubre</h4>
                                                    </div>

                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }}</h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="10">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Octubre">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                                @else
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Octubre</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>








                                            <div class="col-md-3">
                                                @if (!empty($datos[10]))
                                                @php

                                                $a = $datos[10];
                                                $dias;
                                                $b = round(($a*100)/$dias);

                                                if( $b >= 100){
                                                $b=100;
                                                }
                                                @endphp
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Noviembre</h4>
                                                    </div>

                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }}</h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="10">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Octubre">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                                @else
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Noviembre</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                                @endif



                                            </div>


                                            <div class="col-md-3">

                                                @if (!empty($datos[10]))
                                                @php

                                                $a = $datos[10];
                                                $dias;
                                                $b = round(($a*100)/$dias);

                                                if( $b >= 100){
                                                $b=100;
                                                }
                                                @endphp
                                                <div class="card border-primary mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $b; ?>%"><?php echo $b; ?>%</div>
                                                    </div>
                                                    <div class="text-info text-center mt-3">
                                                        <h4>Diciembre</h4>
                                                    </div>

                                                    <div class="text-info text-center mt-2">

                                                        <h6>Reportes enviados:</h6>
                                                        <h1>{{ $a }}</h1>
                                                        <hr>

                                                        <form action="{{ route('reportBit')}}" method="GET">
                                                            <div class="mb-3">
                                                                <input name="mes" type="hidden" class="form-control" id="formGroupExampleInput" value="10">
                                                                <input name="mes1" type="hidden" class="form-control" id="formGroupExampleInput" value="Octubre">
                                                            </div>
                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input class="btn btn-success btn-sm" type="submit" value="Descargar Reporte">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                                @else
                                                <div class="card border-danger mx-sm-1 p-3">
                                                    <div class="progress" style="height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                    </div>
                                                    <div class="text-danger text-center mt-3">
                                                        <h4>Diciembre</h4>
                                                    </div>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5>No se Envio ningun reporte.!! </h5>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @endif

                                @endauth

                            </div>
                        </div>
                    </div>

                    @endsection


                </div>
            </div>
        </div>
    </div>
</div>