@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">





    <div class="row justify-content-center">



        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Agencias</h2>
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




                    <a href="{{ url('agencia/create') }}" class="btn btn-success">Nuevo Registro</a>
                    <hr>


                    <table class=" table table-light text-center">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Acciones</th>


                            </tr>

                        </thead>

                        @php
                        $a=1;
                        @endphp
                        <tbody>
                            @foreach( $agencia as $ag)
                            <tr>
                                <td>{{ $a}}</td>
                                <td>{{ $ag->agencia }}</td>
                            </tr>
                            @php
                            $a++;
                            @endphp

                            <td>
                                <a href="{{ url('/agencia/'.$ag->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                                &nbsp;

                                <form action="{{ url('/agencia/'.$ag->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                </form>
                            </td>

                            @endforeach

                        </tbody>


                    </table>
                    <div class="pagination justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection