@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">



    <div class="row justify-content-center">



        <div class="col-md-10">



            <div class="card">
                <div class="card-header">

                    <h2 class="text-center">Administradores</h2>
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




                    <!--   <a href="{{ route('user.create') }}" class="btn btn-success">Nuevo Registro</a> -->



                    <table class=" table table-light">

                        <thead class="thead-light text-center">
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>names</th>
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
                                <td>{{ $user->user }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->descripcion}}</td>


                                <td>
                                    <!--  <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-warning"> Editar </a>                                    
                                    &nbsp; -->

                                    <form action="{{ url('/user/'.$user->id) }}" class="d-inline" method="POST">
                                        @csrf

                                        <input class="btn btn-danger rounded-0" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                    </form>
                                </td>

                            </tr>

                            @php
                            $a++;
                            @endphp
                            @endforeach
                        </tbody>

                    </table>


                    <hr>
                </div>
            </div>






        </div>


    </div>


</div>

@endsection