<div class="card">
    <div class="card-header">
        <h2><span class="text-center fa fa-home"></span>Generador</h2>
    </div>
    <br>
    <div class="container-fluid">


        <h5>Por Favor Registre los datos Requeridos en el Fomulario Gracias..</15>
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
                        <label for="agencia">Agencia</label>
                        <input type="text" class="form-control" name="agencia" value="{{ Auth::user()->agencia }}" id="agencia" readonly>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="encargadoop">EncargadoOP</label>
                        <input type="text" class="form-control" name="encargadoop" value="{{ Auth::user()->name }}" id="encargadoop" readonly>
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
                        <input type="number" class="form-control" name="tiempo"  id="tiempo" placeholder="tiempo en minutos Ej. 30" >
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="marca">Marca del Generador</label>
                        <input type="text" class="form-control" name="marca"  id="marca" >
                    </div>
                </div>
                <div class="col-md">
                 
                    <div class="form-group">
                        <label for="modelo">Modelo del Generador</label>
                        <input type="text" class="form-control" name="modelo" >
                    </div>
              
                </div>
            </div>



            <hr>
            <div class="row justify-content-center">


                <div class="col-md">
                    <div class="form-floating">
                        <label for="observaciones">Observaciones</label>  
                        <textarea class="form-control" name="observaciones" value="{{ isset($generador->observaciones)?$generador->observaciones:('') }}"  placeholder="dejar las observaciones aqui.." id="floatingTextarea2" style="height: 100px" required></textarea>
                    </div>
                </div>
            </div>

            <!-- {{ date('Y-m-d H:i:s') }}-->
            <br>

            <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">


            <a class="btn btn-primary" href="{{ url('generador/') }}">Regresar</a>
    </div>


</div>