@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<br>


<div class="card">
    <div class="card-header">
        <h3 class="text-center">Bitacora - Centro de Procesamiento de Datos (CPD)</h3>
  <hr>
        <h5>Estimad@. recuerde que debe realizar la bitacora del CPD diariamente gracias...</h5>
    </div>
    <div class="card-body">

        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        

        <a href="{{ url('bitacora/create') }}" class="btn btn-sm btn-flat btn-success bg-gradient-success">Nuevo Registro</a>
        <br>
        <br>

        <div class="table-responsive">
        <table class="table table-striped" style=" font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;" id="bitacoras">

            <thead>
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

                    <!--
                        <td>
                            <a href="{{ url('/bitacora/'.$bitacora->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                            &nbsp;

                            <form action="{{ url('/bitacora/'.$bitacora->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>
                        -->

                </tr>
                @endforeach
            </tbody>

        </table>
        </div>

    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


<script>
    $('#bitacoras').DataTable();
</script>
@stop