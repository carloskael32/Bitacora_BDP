@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')

@stop

@section('content')
<div class="container">


    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @include('user.form',['modo'=>'Agregar '])



    </form>
</div>
@endsection