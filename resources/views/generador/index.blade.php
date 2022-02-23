@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<br>
<div class="card" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
    <div class="card-header">
        <h5 class="text-center"><b>Generadores</b></h5>

        <hr>
        <h6><b>Estimad@.. recuerde que debe realizar la prueba del generador una vez al mes</b></h6>

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




        <a href="{{ url('generador/create') }}" class="btn btn-sm btn-flat btn-success bg-gradient-success">Nuevo Registro</a>
        <hr>


        <div class="table-responsive">
            <table class="table table-striped" id="generadores">

                <thead class="bg-cyan">
                    <tr>
                        <th>#</th>
                        <th>fecha</th>
                        <th>Tiempo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cod. activo</th>
                        <th>Num. Serie</th>
                        <th>Agencia</th>
                        <th>Encargado OP.</th>
                        <th>Observaciones</th>


                    </tr>
                </thead>
                @php
                $a=1;
                @endphp
                <tbody>
                    @foreach( $generador as $gen)
                    <tr>
                        <td>{{ $a}}</td>
                        <td>{{ $gen->fecha }}</td>
                        <td>{{ $gen->tiempo }} min</td>
                        <td>{{ $gen->marca }}</td>
                        <td>{{ $gen->modelo }}</td>
                        <td>{{ $gen->cod_activo }}</td>
                        <td>{{ $gen->num_serie }}</td>
                        <td>{{ $gen->agencia }}</td>
                        <td>{{ $gen->encargadoop }}</td>
                        <td>{{ $gen->observaciones }}</td>

                        <!--     <td>
                            <a href="{{ url('/generador/'.$gen->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                            &nbsp;

                            <form action="{{ url('/generador/'.$gen->id) }}" class="d-inline" method="POST">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>


<script>
    $('#generadores').DataTable({

        "language": {
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": 'Buscar:',
            "paginate": {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        },
        dom: 'Bfrtip',
        buttons: [
            /*  'copy', 'csv',  */
            'excel', 'pdf', 'print'
        ]

    });
</script>


@stop