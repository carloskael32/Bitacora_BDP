@extends('layouts.app')
@section ('title','Encargados Operativos')
@section('content')
<div class="container">


    <form action="{{ route('eno.store') }}" method="POST">
        @csrf
        @include('eno.form',['modo'=>'Crear Usuario'])



    </form>
</div>
@endsection