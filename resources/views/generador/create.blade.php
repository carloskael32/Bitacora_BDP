@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<form action="{{ url('/registergen') }}" method="POST">


    @csrf
    @include('generador.form',['modo'=>'Registrar'])



</form>
@stop

@section('css')
    
@stop

@section('js')
    
@stop

