@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container">


    <form action="{{ route('eno.store') }}" method="POST">
        @csrf
        @include('eno.form',['modo'=>'Crear Usuario'])



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