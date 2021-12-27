
<form action="{{ url('/parametro/'.$par->id) }}" method="POST">

    @csrf
    {{ method_field('PATCH') }}
    <div class="modal fade text-left" id="ModalCreate" tableindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-tittle">{{ _('Actualizar datos')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="col-auto">
                        <div class="form-group">
                            <label for="temmin">Temperatura Minima</label>
                            <input type="number" class="form-control" name="temmin" id="temmin" value="{{ isset($parametro->temmin)?$parametro->temmin:old('temmin')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="temmax">Temperatura Maxima</label>
                            <input type="number" class="form-control" name="temmax" id="temmax" required>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="form-group">
                            <label for="hummin">Humedad Minima</label>
                            <input type="number" class="form-control" name="hummin" id="hummin" required>
                        </div>
                        <div class="form-group">
                            <label for="hummax">Humeadad Maxima</label>
                            <input type="number" class="form-control" name="hummax" id="hummax" required>
                        </div>
                    </div>

                    <div class="col-auto">
                        <input class="btn btn-success rounded-0" type="submit" value="Actualizar">
                    </div>

                </div>
            </div>
        </div>
    </div>


</form>