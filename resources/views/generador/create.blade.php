@extends('layouts.app')

@section('content')
<div class="container">


    <form action="{{ url('/registergen') }}" method="POST">

  
        @csrf
        @include('generador.form',['modo'=>'Registrar'])



    </form>
</div>
@endsection