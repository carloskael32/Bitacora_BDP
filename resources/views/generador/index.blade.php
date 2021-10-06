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




                    <a href="{{ url('generador/create') }}" class="btn btn-success">Nuevo Registro</a>
                    <hr>


                    <table class=" table table-light text-center">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Encargado OP.</th>
                                <th>Agencia</th>
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
                                <td>{{ $gen->agencia }}</td>
                                <td>{{ $gen->encargadoop }}</td>

                                <td>{{ $gen->observaciones }}</td>



                            </tr>
                            @php
                            $a++;
                            @endphp
                            @endforeach
                        </tbody>


                    <!--     <td>
                            <a href="{{ url('/generador/'.$gen->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                            &nbsp;

                            <form action="{{ url('/generador/'.$gen->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td> -->
                      


                    </table>
                    <div class="pagination justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection