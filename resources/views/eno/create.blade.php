@extends('adminlte::page')

@section('title', 'Operativos')

@section('content_header')

@stop

@section('content')
<div class="container">


    <form action="{{ route('eno.store') }}" method="POST">
        @csrf
        @include('eno.form',['modo'=>'Agregar'])



    </form>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop