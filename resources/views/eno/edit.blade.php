



@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{  url('/eno/'.$user->id) }}" method="POST">
<!--{{ url('/user/'.$user->id) }}-->
@csrf
{{ method_field('PATCH') }}
@include('eno.form',['modo'=>'Guardar Cambios'])


</form>
</div>
@endsection