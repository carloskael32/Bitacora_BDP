<form action="{{ url('/parametro/'.$par->id) }}" method="POST">

    @csrf
    {{ method_field('PATCH') }}
    <div class="modal fade text-left" id="ModalCreate" tableindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h5 class="modal-title w-100 text-center">Cambio de valores de los Parametros</h5>
                    <button class="bg-danger" type="button" className="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h6>Recuerde que las alertas se generan de acuerdo a los parametros</h6>
                    <hr>

                    <div class="row justify-content-center">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="temmin">Temperatura Minima</label>
                                <input type="number" class="form-control" name="temmin" id="temmin" value="{{ isset($parametro->temmin)?$parametro->temmin:old('temmin')}}" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="temmax">Temperatura Maxima</label>
                                <input type="number" class="form-control" name="temmax" id="temmax" required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="hummin">Humedad Minima</label>
                                <input type="number" class="form-control" name="hummin" id="hummin" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="hummax">Humedad Maxima</label>
                                <input type="number" class="form-control" name="hummax" id="hummax" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <input class="btn btn-sm btn-flat btn-success bg-gradient-success" type="submit" value="Guardar cambios">
                    </div>

                </div>
            </div>
        </div>
    </div>


</form>