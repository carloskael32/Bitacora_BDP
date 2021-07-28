

<form action="{{ url('/bitacora') }}" method="POST">
@csrf
@include('bitacora.form')



</form>