@extends('layouts.app')

@section('content')

<h1 class="text-center">Reportes</h1>
<br>
<!-- Tabla datos -->
<div class="container col-11">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Reporte de Agencias
                </div>

                <div class="card-body">

                    <!--
                    <form action="{{ route('PDFBitacorareporte')}}" method="GET">

                        <label for="exampleDataList" class="form-label">Selecciones alguna Agencia</label>
                        <br>
                        <div class="form-floating">
                            <select name="agencia" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                @foreach($agencias as $agencia)

                                <option value="{{ $agencia->agencia }}">{{ $agencia->agencia }} </option>

                                @endforeach
                            </select>
                            <label for="floatingSelect">Works with selects</label>

                        </div>
                        <br>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input class="btn btn-primary" type="submit" value="Generar Reporte">
                        </div>

                    </form>
-->


                    <!-- Genera reportes segun agencia y mes -->
                    <h4 class="text-center">Reportes por Mes</h4>
                    <form action="{{ route('PDFBitacorareporte')}}" method="GET">
                        <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                        <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="search...">
                        <datalist name="agencia" id="datalistOptions">
                            @foreach($agencias as $agencia)
                            <option value="{{ $agencia->agencia }}">
                                @endforeach
                        </datalist>
                        <br>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Mes: </label>
                            <input name="mes" type="month" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <br>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input class="btn btn-primary" type="submit" value="Generar Reporte">
                        </div>

                    </form>

                    <hr>
                    <br>

                    <!-- Genera Reportes Segun Fechas-->

                    <h4 class="text-center">Reporte con Intervalos
                        <br>
                        de Fechas
                    </h4>
                    <form action="{{ route('PDFBitacorareporte')}}" method="GET">
                        <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                        <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="search...">
                        <datalist name="agencia" id="datalistOptions">
                            @foreach($agencias as $agencia)
                            <option value="{{ $agencia->agencia }}">
                                @endforeach
                        </datalist>
                        <br>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">De: </label>
                            <input name="date1" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Hasta: </label>
                            <input name="date2" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input class="btn btn-primary" type="submit" value="Generar Reporte">
                        </div>

                    </form>


                </div>

                <div class="card-footer text-muted text-center">
                    BDP-SAM
                </div>
            </div>
        </div>


        <div class="col-9">


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


        </div>
    </div>
</div>

@endsection