

@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">





    <div class="row justify-content-center">



        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Generador</h2>
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

                    <h5>Estimad@..  recuerde que debe realizar la prueba del generador una vez al mes</15>
                    <hr>


                    <a href="{{ url('generador/create') }}" class="btn btn-success">Nuevo Registro</a>
                    <hr>


                    <table class=" table table-light text-center">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Tiempo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
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
                                <td>{{ $gen->agencia }}</td>
                                <td>{{ $gen->EncargadoOP }}</td>
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
                    <div class="pagination justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection