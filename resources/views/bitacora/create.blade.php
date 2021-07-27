CREATE
formulario de creacion de bitacoras

<form action="{{ url('/bitacora') }}" method="POST">
@csrf

    <label for="Agencia">Agencia</label>
    <input type="text" name="Agencia" id="Agencia">
    <br>
    <label for="EncargadoOP">EncargadoOP</label>
    <input type="text" name="EncargadoOP" id="EncargadoOP">
    <br>
    <label for="Temperatura">Temperatura</label>
    <input type="double" name="Temperatura" id="Temperatura">
    <br>
    <label for="Humedad">Humedad</label>
    <input type="double" name="Humedad" id="Humedad">
    <br>
    <label for="Filtracion">Filtracion</label>
    <input type="text" name="Filtracion" id="Filtracion">
    <br>
    <label for="UPS">UPS</label>
    <input type="text" name="UPS" id="UPS">
    <br>

    <label for="Generador">Generador</label>
    <input type="text" name="Generador" id="Generador">

    <br>
    <label for="Observaciones">Observaciones</label>
    <input type="text" name="Observaciones" id="Observaciones">
    <br>
    <label for="Fecha_Hora">Fecha_Hora</label>
    <input type="datetime-local" name="Fecha_Hora" id="Fecha_Hora">
    <br>

    <input type="submit">



</form>