

<table class="table table-light">

    <thead class="thead-light">
        <tr>
           
            <th>Agencia</th>
            <th>EncargadoOP.</th>
            <th>Temperatura</th>
            <th>Humedad</th>
            <th>Filtracion</th>
            <th>UPS</th>
            <th>Generador</th>
            <th>Observaciones</th>
            <th>Fecha Hora</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $bitacoras as $bitacora)
        <tr>
            
            <td>{{ $bitacora->Agencia }}</td>
            <td>{{ $bitacora->EncargadoOP }}</td>
            <td>{{ $bitacora->Temperatura }}</td>
            <td>{{ $bitacora->Humedad }}</td>
            <td>{{ $bitacora->Filtracion }}</td>
            <td>{{ $bitacora->UPS }}</td>
            <td>{{ $bitacora->Generador }}</td>
            <td>{{ $bitacora->Observaciones }}</td>
            <td>{{ $bitacora->created_at }}</td>
            <td>
                <a href="{{ url('/bitacora/'.$bitacora->id.'/edit') }}"> Editar </a>
                |
                <form action="{{ url('/bitacora/'.$bitacora->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>

</table>