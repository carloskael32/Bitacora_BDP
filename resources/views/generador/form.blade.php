<br>
<div class="card border shadow">
    <div class="card-header bg-light">
        <h5 class="text-center"><b>Registro de pruebas con el Generador</b></h5>
        <hr>
        <h6><b>Por Favor Registre los datos Requeridos en el Fomulario Gracias..</b></h6>
    </div>
    <div class="card-body">


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
                    <label for="agencia">Agencia</label>
                    <input type="text" class="form-control" name="agencia" value="{{ Auth::user()->agencia }}" id="agencia" readonly>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="encargadoop">EncargadoOP</label>
                    <input type="text" class="form-control" name="encargadoop" value="{{ Auth::user()->user }}" id="encargadoop" readonly>
                </div>
            </div>
            <div class="col-md">
                @if($modo == 'Registrar')
                <div class="form-group">
                    <label for="fecha">Fecha y Hora</label>
                    <input type="datetime" class="form-control" name="fecha" value="{{ isset($generador->fecha)?$generador->fecha:date('Y-m-d H:i:s') }}" readonly>
                </div>
                @endif
            </div>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="form-group">
                    <label for="tiempo">Tiempo de Prueba</label>
                    <input type="number" class="form-control" name="tiempo" id="tiempo" placeholder="tiempo en minutos Ej. 30">
                </div>
            </div>
            @foreach ($generador as $gen)
            <div class="col-md">
                <div class="form-group">
                    <label for="marca">Marca del Generador</label>
                    <input type="text" class="form-control" value="{{ $gen->marca }}" name="marca" id="marca">
                </div>
            </div>
            <div class="col-md">

                <div class="form-group">
                    <label for="modelo">Modelo del Generador</label>
                    <input type="text" class="form-control" value="{{ $gen->modelo }}" name="modelo">
                </div>

            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="form-group">
                    <label for="cod_activo">cod. activo</label>
                    <input type="text" class="form-control" value="{{ $gen->cod_activo }}" name="cod_activo" id="cod_activo">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="num_serie">num. serie</label>
                    <input type="text"  class="form-control" value="{{ $gen->num_serie }}" name="num_serie" id="num_serie">
                </div>
            </div>
        </div>
            @endforeach



        <hr>
        <div class="row justify-content-center">


            <div class="col-md">
                <div class="form-floating">
                    <label for="observaciones">Observaciones</label>
                    <input type="text" class="form-control" name="observaciones" value="Sin Observaciones"   style="height: 50px">
                </div>
            </div>
        </div>

        <!-- {{ date('Y-m-d H:i:s') }}-->
        <br>

        <input class="btn btn-sm btn-flat bg-gradient-success" type="submit" value="{{ $modo }} Datos">


        <a class="btn btn-sm btn-flat bg-gradient-primary" href="{{ url('generador/') }}">Regresar</a>
    </div>


</div>