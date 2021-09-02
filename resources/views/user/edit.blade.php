



@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{  url('/user/'.$user->id) }}" method="POST">
<!--{{ url('/user/'.$user->id) }}-->
@csrf
{{ method_field('PATCH') }}
@include('user.form',['modo'=>'Editar'])


</form>
</div>
@endsection