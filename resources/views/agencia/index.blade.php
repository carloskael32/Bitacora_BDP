@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">





    <div class="row justify-content-center">



        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Agencias</h2>
                </div>
                <div class="card-body">

                    @if(Session::has('mensaje1'))
                    <div class="alert alert-success alert-dismissible" role="alert">

                        {{ Session::get('mensaje1')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @elseif(Session::has('mensaje2'))
                    <div class="alert alert-danger alert-dismissible" role="alert">

                        {{ Session::get('mensaje2')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif





                    <form action="{{ url('/registerage') }}" method="POST">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="agencia">ingrese un nombre: </label>
                                    <input type="text" class="form-control" name="agencia" id="agencia" required autofocus>

                                </div>
                            </div>
                            <div class="col">
                                <br>
                                <input class="btn btn-success" type="submit" value="Registrar Datos">
                            </div>
                        </div>

                    </form>












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

                                @php
                                $a++;
                                @endphp

                                <td>



                                    <form action="{{ url('/agencia/'.$ag->id) }}" class="d-inline" method="POST">
                                        @csrf

                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                    </form>
                                </td>
                            </tr>
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