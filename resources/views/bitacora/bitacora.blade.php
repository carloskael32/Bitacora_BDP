@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')

@stop

@section('content')

<br>
<div class="card" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
    <div class="card-header">
        <h5 class="text-center"><b>Bitacora - Centro de Procesamiento de Datos (CPD)</b></h5>
        <hr>
        <h6><b>Estimad@. recuerde que debe realizar la bitacora del CPD diariamente gracias...</b></h6>
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
            <table class="table table-striped" id="bitacoras">

                <thead class="bg-cyan">
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
                @php
                $a=1;
                @endphp
                <tbody>
                    @foreach( $bitacoras as $bitacora)
                    <tr>

                        <td>{{ $a}}</td>
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
                    @php
                    $a++;
                    @endphp
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
    $('#bitacoras').DataTable({
        "language": {
            "lengthMenu": "Mostrar " +
                `<select class="custom-select custom-select-sm form-control form-control-sm"> 
            <option value ='10' >10</option>
            <option value ='25' >25</option>
            <option value ='50' >50</option>
            <option value ='100'>100</option>
            <option value ='-1' >all</option>
            </select>` +
                " registros por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": 'Buscar:',
            "paginate": {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
</script>
@stop