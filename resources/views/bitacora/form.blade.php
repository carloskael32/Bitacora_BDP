<label for="Agencia">Agencia</label>
<input type="text" name="Agencia" value="{{ isset($bitacora->Agencia)?$bitacora->Agencia:'' }}" id="Agencia">
<br>
<label for="EncargadoOP">EncargadoOP</label>
<input type="text" name="EncargadoOP" value="{{ isset($bitacora->EncargadoOP)?$bitacora->EncargadoOP:'' }}" id="EncargadoOP">
<br>
<label for="Temperatura">Temperatura</label>
<input type="double" name="Temperatura" value="{{ isset($bitacora->Temperatura)?$bitacora->Temperatura:'' }}" id="Temperatura">
<br>
<label for="Humedad">Humedad</label>
<input type="double" name="Humedad" value="{{ isset($bitacora->Humedad)?$bitacora->Humedad:'' }}" id="Humedad">
<br>
<label for="Filtracion">Filtracion</label>
<input type="text" name="Filtracion" value="{{ isset($bitacora->Filtracion)?$bitacora->Filtracion:'' }}" id="Filtracion">
<br>
<label for="UPS">UPS</label>
<input type="text" name="UPS" value="{{ isset($bitacora->UPS)?$bitacora->UPS:'' }}" id="UPS">
<br>

<label for="Generador">Generador</label>
<input type="text" name="Generador" value="{{ isset($bitacora->Generador)?$bitacora->Generador:'' }}" id="Generador">

<br>
<label for="Observaciones">Observaciones</label>
<input type="text" name="Observaciones" value="{{ isset($bitacora->Observaciones)?$bitacora->Observaciones:'' }}" id="Observaciones">
<br>
<label for="fecha">Fecha_Hora</label>
<input type="dateTime-local" name="fecha" >
<br>

<!-- {{ date('Y-m-d H:i:s') }}-->

<input type="submit" value="Guardar">