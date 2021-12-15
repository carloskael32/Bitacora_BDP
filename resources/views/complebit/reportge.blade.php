@extends('layouts.app')
@section('content')
@if (Auth::user()->acceso == "no")
@php


$datos2 = Arr::pluck($meses,'fecha','mes');

@endphp
@endif
@section ('title','Reportes')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">


            <div class="card">
                <div class="card-header">

                    <h2 class="text-center">Reporte de Generadores en Agencias</h2>
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
                                <h5 class="text-center">Pruebas Registradas hasta el momento..</h5>
                                <hr>
                                <table class=" table table-light">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Tiempo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Agencia</th>
                                            <th>Encargado OP.</th>
                                            <th>Observaciones</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach( $generador as $gen)
                                        <tr>

                                            <td>{{ $gen->id }}</td>
                                            <td>{{ $gen->fecha }}</td>
                                            <td>{{ $gen->tiempo }}</td>
                                            <td>{{ $gen->marca }}</td>
                                            <td>{{ $gen->modelo }}</td>
                                            <td>{{ $gen->agencia }}</td>
                                            <td>{{ $gen->EncargadoOP }}</td>
                                            <td>{{ $gen->observaciones }}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                <div class="pagination justify-content-center">

                                    {!! $generador->links() !!}

                                </div>

                                @else
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                             <!-- ENERO -->
                                             <div class="col-md-3">
                                                @if (!empty($datos2[1]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Enero</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[1] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Enero</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>



                                            <!-- FEBRERO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[2]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Febrero</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[2] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Febrero</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>


                                            <!-- MARZO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[3]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Marzo</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[3] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Marzo</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- ABRIL -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[4]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Abril</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[4] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Abril</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                        <br>
                                        <hr>

                                        <div class="row">

                                            <!-- MAYO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[5]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Mayo</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[5] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Mayo</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- JUNIO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[6]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Junio</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[6] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Junio</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>



                                            <!-- JULIO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[7]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Julio</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[7] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Julio</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- AGOSTO -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[8]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Agosto</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[8] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Agosto</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                        <br>
                                        <hr>

                                        <div class="row">
                                            <!-- SEPTIEMBRE -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[9]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Septiembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[9] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Septiembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- OCTUBRE -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[10]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Octubre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[10] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Octubre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>


                                            <!-- NOVIEMBRE -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[11]))

                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Noviembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[11] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Noviembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- DICIEMBRE -->
                                            <div class="col-md-3">
                                                @if (!empty($datos2[12]))
                                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Diciembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Reporte enviado</h5>
                                                        <h5>
                                                            <p class="card-text text-center"><?= $datos2[12] ?></p>
                                                        </h5>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                                    <div class="card-header text-center">
                                                        <h4>Diciembre</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">No se envio</h5>
                                                        <h5>
                                                            <p class="card-text text-center"> ningun reporte.!!</p>
                                                        </h5>
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