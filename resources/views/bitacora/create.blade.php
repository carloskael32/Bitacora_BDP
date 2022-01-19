@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 
@stop

@section('content')
<div class="container">




<form action="{{ url('/bitacora') }}" method="POST">


    @csrf
    @include('bitacora.form',['modo'=>'Registrar'])



</form>
</div>

@stop

<!-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
 -->