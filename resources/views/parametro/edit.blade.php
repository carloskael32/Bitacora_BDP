



@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/agencia/'.$agencia->id) }}" method="POST">

@csrf
{{ method_field('PATCH') }}
@include('agencia.form',['modo'=>'Editar'])


</form>
</div>
@endsection