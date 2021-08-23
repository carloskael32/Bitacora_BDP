@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">


    <h1 class="text-center">Usuarios</h1>


    <div class="row justify-content-center">



        <div class="col-md-5">


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
                        <th>User Name</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
       

                    @foreach( $users as $user)

                    <tr>
                 

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
              

                        <td>
                            <a href="{{ url('/bitacora/'.$user->id.'/edit') }}" class="btn btn-warning"> Editar </a>

                            |

                            <form action="{{ url('/bitacora/'.$user->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>


        </div>


    </div>


</div>

@endsection