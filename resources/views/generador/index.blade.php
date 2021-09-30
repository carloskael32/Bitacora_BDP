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

                                   


                    <a href="{{ url('bitacora/create') }}" class="btn btn-success">Nuevo Registro</a>
                    <hr>
                    
                    
                    <table class=" table table-light">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Fehca</th>
                                <th>EncargadoOP.</th>
                                <th>Agencia</th>
                                <th>Observaciones</th>
                            

                            </tr>
                        </thead>


                    </table>
                    <div class="pagination justify-content-center">
              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection