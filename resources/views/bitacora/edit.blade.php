

<form action="{{ url('/bitacora/'.$bitacora->id) }}" method="POST">

@csrf
{{ method_field('PATCH') }}
@include('bitacora.form')


</form>