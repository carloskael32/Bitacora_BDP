@extends('adminlte::page')

@section('title', 'Operativos')

@section('content_header')

@stop

@section('content')
<br>


<div class="card">
    <div class="card-header  bg-light">
        <h5 class="text-center"> <b> Encargados Operativos</b></h5>
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




        <a href="{{ route('eno.create') }}" class="btn btn-sm btn-flat btn-success bg-gradient-success">Nuevo Registro</a>

        <br>
        <br>

        <div class="table-responsive">
            <table class="table table-striped" id="operativos">

            <thead class="bg-cyan">
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>names</th>
                    <th>Agencia</th>
                    <th>Correo</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody class="text-center">

                @php
                $a = 1;
                @endphp

                @foreach( $users as $user)

                <tr>


                    <td>{{ $a }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->user}}</td>
                    <td>{{ $user->agencia}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->descripcion}}</td>


                    <td>
                        <!-- <a href="{{ url('/eno/'.$user->id.'/edit') }}" class="btn btn-warning"> Editar </a> -->


                        <form action="{{ url('/eno/'.$user->id) }}" class="d-inline" method="POST">
                            @csrf

                            <input class="btn btn-sm btn-flat btn-danger bg-gradient-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                        </form>
                    </td>

                </tr>
                @php
                $a++;
                @endphp

                @endforeach
            </tbody>
        </table>
       
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
    $('#operativos').DataTable({
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