@extends('layouts.app')

@section('content')
<div class="container">


    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @include('user.form',['modo'=>'Crear'])



    </form>
</div>
@endsection