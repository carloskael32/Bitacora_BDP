



@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/generador/'.$generador->id) }}" method="POST">

@csrf
{{ method_field('PATCH') }}
@include('generador.form',['modo'=>'Editar'])


</form>
</div>
@endsection