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
                    <label for="exampleDataList" class="form-label">Selecciones alguna Agencia</label>
<br>
                    <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                        @foreach($agencias as $agencia)
                     
                        <option value="{{ $agencia->agencia }}">{{ $agencia->agencia }}</option>

                        @endforeach
                    </select>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a class="btn btn-primary " href="{{ route('PDFBitacorareporte',[$agencia->agencia]) }}" target="_blank">Generar Reporte</a>


                    </div>

                    <hr>
                    <br>
                    <br>
                    <h4 class="text-center">Ingrese el Intervalo
                        <br>
                        de Fechas
                    </h4>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">De: </label>
                        <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="mb-3 ">
                        <label for="formGroupExampleInput2" class="text-left">Hasta: </label>

                        <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>


                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a class="btn btn-primary " href="{{ route('PDFBitacorareporte') }}" target="_blank">Generar Reporte</a>
                    </div>



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