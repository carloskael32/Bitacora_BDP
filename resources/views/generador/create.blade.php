@extends('layouts.app')

@section('content')
<div class="container">




    <form action="{{ url('/register') }}" method="POST">

  
        @csrf
        @include('generador.form',['modo'=>'Registrar'])



    </form>
</div>
@endsection