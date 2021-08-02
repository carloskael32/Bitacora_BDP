@extends('layouts.app')

@section('content')
<br>
<div class="container col-11">


    <h1 class="text-center">Bitacora</h1>


    <div class="row">

        <div class="col-2">
            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <img src="https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg" width="80%" class="rounded-circle" alt="...">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>

        <div class="col-10">


            @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif




            <a href="{{ url('bitacora/create') }}" class="btn btn-success">Nuevo Registro</a>
            <br>
            <br>
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
                        <th>Acciones</th>
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
                            <a href="{{ url('/bitacora/'.$bitacora->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                            |

                            <form action="{{ url('/bitacora/'.$bitacora->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>

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