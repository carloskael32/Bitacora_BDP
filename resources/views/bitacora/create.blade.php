@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <form action="{{ url('/bitacora') }}" method="POST">
        @csrf
        @include('bitacora.form',['modo'=>'Registrar'])
    </form>

@stop

@section('css')

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop