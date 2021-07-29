

@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/bitacora') }}" method="POST">
@csrf
@include('bitacora.form',['modo'=>'Crear'])



</form>
</div>
@endsection