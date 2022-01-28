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
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="{{ isset($generador->fecha)?$generador->fecha:date('Y-m-d') }}" readonly>
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
            <div class="col-md">
                <div class="form-group">
                    <label for="marca">Marca del Generador</label>
                    <input type="text" class="form-control" name="marca" id="marca">
                </div>
            </div>
            <div class="col-md">

                <div class="form-group">
                    <label for="modelo">Modelo del Generador</label>
                    <input type="text" class="form-control" name="modelo">
                </div>

            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="form-group">
                    <label for="cod_activo">cod. activo</label>
                    <input type="text" class="form-control" name="cod_activo" id="cod_activo">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="num_serie">num. serie</label>
                    <input type="text" class="form-control" name="num_serie" id="num_serie">
                </div>
            </div>
      
        </div>



        <hr>
        <div class="row justify-content-center">


            <div class="col-md">
                <div class="form-floating">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" name="observaciones" value="{{ isset($generador->observaciones)?$generador->observaciones:('') }}" placeholder="dejar las observaciones aqui.." id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
            </div>
        </div>

        <!-- {{ date('Y-m-d H:i:s') }}-->
        <br>

        <input class="btn btn-sm btn-flat bg-gradient-success" type="submit" value="{{ $modo }} Datos">


        <a class="btn btn-sm btn-flat bg-gradient-primary" href="{{ url('generador/') }}">Regresar</a>
    </div>


</div>

