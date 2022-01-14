@extends('layouts.applogin')
@section ('title','Login')
@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <br>
            <br>

            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h2> <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesion </h2>
                </div>
                <div class="card-body text">

                    <form method="POST" action="">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" name="user" class="form-control" id="floatingInput" placeholder="name@example.com" required autocomplete="name" autofocus>

                            <label for="floatingInput"><i class="bi bi-person-circle"></i> name de Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com" required autocomplete="name" autofocus>
                            <label for="floatingInput"><i class="bi bi-key-fill "></i> Contraseña</label>
                        </div>

                        @error('message')

                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                            </div>
                        </div>
                     
                        @enderror

                        <div class="md-4 ">
                            <button type="submit" class="btn btn-primary">
                                Ingresar
                            </button>
                        </div>

                    </form>

                </div>
                <div class="card-footer text-muted">
                    Derechos reservados 2021
                </div>
            </div>





        </div>
    </div>
</div>
@endsection