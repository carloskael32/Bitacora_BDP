@extends('layouts.app')

@section('content')


<h1 class="text-center">Reportes</h1>
<br>
<!-- Tabla datos -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">


            @if(Session::has('mensaje'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            <div class="card">
                <div class="card-header text-center">
                    Reporte de Agencias
                </div>

                <div class="card-body">

                    <!-- Genera reportes segun agencia y mes -->
                    <h4 class="text-center">Reportes por Mes</h4>
                    <form action="{{ route('PDFBitacorareporte')}}" method="GET">
                        <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                        <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="buscar..." required>
                        <datalist name="agencia" id="datalistOptions">
                            @foreach($agencias as $agencia)
                            <option value="{{ $agencia->agencia }}">
                                @endforeach
                        </datalist>
                        <br>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Mes: </label>
                            <input name="mes" type="month" class="form-control" id="formGroupExampleInput" placeholder="Ejemplo: enero 2021" required>
                        </div>
                        <br>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input class="btn btn-primary" type="submit" value="Generar Reporte">
                        </div>

                    </form>

                    <hr>
                    <br>
                    @if(Session::has('mensaje2'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ Session::get('mensaje2')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <!-- Genera Reportes Segun Fechas-->

                    <h4 class="text-center">Reporte con Intervalos
                        <br>
                        de Fechas
                    </h4>
                    <form action="{{ route('PDFBitacorareporte2')}}" method="GET">
                        <label for="exampleDataList" class="form-label">Selecciones una Agencia: </label>
                        <input name="agencia" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="buscar..." required>
                        <datalist name="agencia" id="datalistOptions">
                            @foreach($agencias as $agencia)
                            <option value="{{ $agencia->agencia }}">
                                @endforeach
                        </datalist>
                        <br>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">De: </label>
                            <input name="date1" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Hasta: </label>
                            <input name="date2" type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" required>
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input class="btn btn-primary" type="submit" value="Generar Reporte">
                        </div>

                    </form>


                </div>

                <div class="card-footer text-muted text-center">
                    BDP-SAM
                </div>
            </div>
        </div>


        <div class="col-md-9">

            @auth
            @if (Auth::user()->acceso == "yes")
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

                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="pagination justify-content-center">
                {!! $bitacoras->links() !!}
            </div>
            @else
            <div class="card">
                <div class="card-header">
                    <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                </div>
                <div class="card-body">
                    <h5>Hi <strong>{{ Auth::user()->name }},</strong> {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
                    </br>
                    <hr>

                    <div class="row w-100">
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info text-info p-3"><span class="text-center fa fa-plane-departure" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3">
                                    <h4>Registros</h4>
                                </div>
                                <div class="text-info text-center mt-2">
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
                                <div class="text-success text-center mt-3">
                                    <h4>Baggage</h4>
                                </div>
                                <div class="text-success text-center mt-2">
                                    <h1>9,332</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="card border-danger text-danger p-3 my-card"><span class="text-center fa fa-person-booth" aria-hidden="true"></span></div>
                                <div class="text-danger text-center mt-3">
                                    <h4>Passengers</h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>12,762</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning mx-sm-1 p-3">
                                <div class="card border-warning text-warning p-3 my-card"><span class="text-center fa fa-users" aria-hidden="true"></span></div>
                                <div class="text-warning text-center mt-3">
                                    <h4>Users</h4>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h1>{{ Auth::user()->count() }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            @endif
            @endauth






        </div>
    </div>
</div>

@endsection