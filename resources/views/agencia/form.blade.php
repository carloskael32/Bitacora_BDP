<div class="card">
    <div class="card-header">
        <h2><span class="text-center fa fa-home"></span>Agencias</h2>
    </div>
    <br>
    <div class="container-fluid">


        <h5>Registro de Nuevas Agencias</15>
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
                        <input type="text" class="form-control" name="agencia" value="{{ Auth::user()->agencia }}" id="agencia">
                    </div>
                </div>


            </div>



            <hr>


            <!-- {{ date('Y-m-d H:i:s') }}-->
            <br>

            <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">


            <a class="btn btn-primary" href="{{ url('agencia/') }}">Regresar</a>
    </div>


</div>