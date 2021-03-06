<br>


<div class="card border shadow">

    <div class="card-body">
        <div class="container col-5 border border-info">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">

                            <b> Parametros de control del CPD</b>
                            <thead>
                                <th></th>
                                <th style="background-color: #1565C0; color: white;">Temperatura</th>
                                <th style="background-color: #1565C0; color: white;">Humedad</th>
                            </thead>
                            <tr>
                                @foreach ($parametro as $par)
                                <td>Valor Mínimo</td>
                                <td>{{$par->temmin}}°C</td>
                                <td>{{$par->hummin}}%</td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($parametro as $par)
                                <td>Valor Máximo</td>
                                <td>{{ $par->temmax}}°C</td>
                                <td>{{ $par->hummax}}%</td>
                                @endforeach
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid" >

            <br>
            <h6><b>Por Favor Registre los datos Requeridos en el Fomulario Gracias..</b></h6>
                <hr>
                @if(count($errors)>0)

                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Agencia">Agencia</label>
                            <input type="text" class="form-control" name="Agencia" value="{{ Auth::user()->agencia }}" id="Agencia" readonly>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="encargadoop">encargadoop</label>
                            <input type="text" class="form-control" name="encargadoop" value="{{ Auth::user()->user }}" id="encargadoop" readonly>
                        </div>
                    </div>
                                            
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="name" hidden>
                       
                    <div class="col-md">
                        @if($modo == 'Registrar')
                        <div class="form-group">
                            <label for="fecha">Fecha y Hora</label>
                            <input type="datetime" class="form-control" name="fecha" value="{{ isset($bitacora->fecha)?$bitacora->fecha:date('Y-m-d H:i:s') }}" readonly>
                        </div>
                        @endif
                    </div>
                </div>

                <hr>
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Temperatura">Temperatura</label>
                            <input type="number" step=".01" class="form-control" name="Temperatura" value="{{ isset($bitacora->Temperatura)?$bitacora->Temperatura:old('Temperatura') }}" id="Temperatura" autofocus>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Humedad">Humedad</label>
                            <input type="number" step=".01" class="form-control" name="Humedad" value="{{ isset($bitacora->Humedad)?$bitacora->Humedad:old('Humedad') }}" id="Humedad">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Filtracion">Filtracion</label>
                            <br>
                            <select class="form-control" name="Filtracion">
                                <option value="No" selected>No</option>
                                <option value="Si">Si</option>
                            </select>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="ups">ups</label>
                            <br>
                            <select class="form-control" name="ups">
                                <option value="Fuera de linea">Fuera de linea</option>
                                <option value="En linea" selected>En linea</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Generador">Generador</label>
                            <br>

                            <select class="form-control" name="Generador">
                                <option value="Fuera de linea">Fuera de linea</option>
                                <option value="En linea" selected>En linea</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="Observaciones">Observaciones</label>
                            <input type="text" class="form-control" name="Observaciones" value="Sin Observaciones" id="Observaciones">
                        </div>
                    </div>
                </div>

                <!-- {{ date('Y-m-d H:i:s') }}-->
                <br>

                <input class="btn btn-sm btn-flat btn-success bg-gradient-success" type="submit" value="{{ $modo }} Datos">


                <a class="btn btn-sm btn-flat btn-primary bg-gradient-primary" href="{{ url('bitacora/') }}">Regresar</a>
        </div>



    </div>
</div>