<div class="card">
    <div class="card-header">

        <h1>{{ $modo }} Encargados Operativos</h1>
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

        @auth





        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('nombre completo') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user->name)?$user->name:old('name') }}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('nombre de usuario') }}</label>

            <div class="col-md-6">
                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" autofocus>

                @error('user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="agencia" class="col-md-4 col-form-label text-md-right">{{ __('Agencia') }}</label>

            <div class="col-md-6">
                <input id="agencia" type="text" class="form-control @error('agencia') is-invalid @enderror" name="agencia" autocomplete="agencia" autofocus>

                @error('agencia')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

            <div class="col-md-6">
                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" autocomplete="descripcion" autofocus>

                @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user->email)?$user->email:old('email') }}" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        @endauth
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <input class="btn btn-success" type="submit" value="{{ $modo }} ">
            <a class="btn btn-primary" href="{{ url('eno/') }}">Regresar</a>
        </div>

    </div>
</div>
</div>





<!-- {{ date('Y-m-d H:i:s') }}-->