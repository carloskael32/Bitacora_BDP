@extends('layouts.app')
@section ('title','Alertas')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Alertas en CPD´s</h2>
                </div>
                <div class="card-body">

                    <!-- Tabla datos -->
                    <div class="container col-3 border border-dark">
                        <div class="row">
                            <div class="col">
                                <table class="table text-center">
                                    <thead>
                                        <th></th>
                                        <th>Temperatura</th>
                                        <th>Humedad</th>
                                    </thead>
                                    <tr>
                                        <td>Valor Mínimo</td>
                                        <td>0°C</td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>Valor Máximo</td>
                                        <td>40°C</td>
                                        <td>85%</td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                    <br>
                    <!-- Tabla Central -->
                    <h5>Lista general de temperatura y humedad fuera de los parametros establecidos.</h5>
                    <hr>

                    <div class="container col-11">
                        <div class="row">
                            <div class="col">

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
                                            <th>Eventos</th>

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



                                            <td>
                                                <form action="{{ route('reportAlert')}}" method="GET">

                                                    <input name="agencia" type="hidden" class="form-control" id="formGroupExampleInput" value="{{ $bitacora->agencia}}">
                                                    <input class="btn btn-primary btn-sm rounded-0" type="submit" value="Ver Eventos">


                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection