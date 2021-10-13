@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>
@endif

<div class="row">
    <div class="col-auto">
        <div class="form-group">
            <label for="agencia">Agencia</label>
            <input type="text" class="form-control" name="agencia" id="agencia" required>
        </div>


    </div>
    
    <div class="col-auto">
        <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
    </div>



</div>