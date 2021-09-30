



@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/bitacora/'.$bitacora->id) }}" method="POST">

@csrf
{{ method_field('PATCH') }}
@include('bitacora.form',['modo'=>'Editar'])


</form>
</div>
@endsection