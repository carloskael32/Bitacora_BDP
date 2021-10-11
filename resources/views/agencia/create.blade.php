@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('/agencia') }}" method="POST">

  
        @csrf
        @include('agencia.form',['modo'=>'Registrar'])



    </form>
</div>
@endsection