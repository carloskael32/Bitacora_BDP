@extends('layouts.app')


@section('content')

<h1 class="text-center">Alertas</h1>
<br>
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
        </div>
    </div>
</div>



@endsection