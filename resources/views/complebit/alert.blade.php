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

                    <h5>Parametros fuera de los parametros establecidos</h5>
                    <hr>


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

                    <div class="container col-10">
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
                                            <td>{{ $bitacora->Agencia }}</td>
                                            <td>{{ $bitacora->EncargadoOP }}</td>
                                            <td>{{ $bitacora->Temperatura }}</td>
                                            <td>{{ $bitacora->Humedad }}</td>
                                            <td>{{ $bitacora->Filtracion }}</td>
                                            <td>{{ $bitacora->UPS }}</td>
                                            <td>{{ $bitacora->Generador }}</td>
                                            <td>{{ $bitacora->Observaciones }}</td>
                                            <td>{{ $bitacora->Fecha }}</td>



                                            <td>
                                                <form action="{{ route('reportAlert')}}" method="GET">

                                                    <input name="agencia" type="hidden" class="form-control" id="formGroupExampleInput" value="{{ $bitacora->Agencia}}">
                                                    <input class="btn btn-success" type="submit" value="Ver Eventos">


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