@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<br>
<div class="card" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
    <div class="card-header">
        <h5 class="text-center"><b>Alertas en el Centro de Procesamiento de Datos - CPD</b></h5>
    </div>
    <div class="card-body">

        <!-- Tabla datos -->
        <div class="container col-3">
            <div class="row">
                <div class="col">
                    <table class="table text-center border border-cyan">
                        <thead>
                            <th></th>
                            <th>Temperatura</th>
                            <th>Humedad</th>
                        </thead>
                        <tbody>
                            @foreach ($parametro as $par)
                            <tr>
                                <td>Valor Mínimo</td>
                                <td>{{$par->temmin}}°C</td>
                                <td>{{$par->hummin}}%</td>
                            </tr>
                            <tr>
                                <td>Valor Máximo</td>
                                <td>{{$par->temmax}}°C</td>
                                <td>{{$par->hummax}}%</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <a href="#" class="btn btn-sm btn-flat btn-primary bg-gradient-primary" type="submit" data-toggle="modal" data-target="#ModalCreate">
                                        {{_('Modificar Parametros')}}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <br>
        <!-- Tabla Central -->
        <h6><b>Lista general de temperatura y humedad fuera de los parametros establecidos.</b></h6>
        <hr>

        <div class="table-responsive">

            <table class="table table-striped" id="alertas">

                <thead class="bg-cyan text-center">
                    <tr>
                        <th>#</th>
                        <th>Agencia</th>
                        <th>EncargadoOP.</th>
                        <th>Temperatura</th>
                        <th>Humedad</th>
                        <th>Filtracion</th>
                        <th>UPS</th>
                        <th>Generador</th>
                        <th>Observaciones</th>
                        <th>Fecha</th>
                        <th>Resumen</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach( $bitacoras as $bitacora)
                    <tr>

                        <td>{{ $bitacora->id }}</td>
                        <td>{{ $bitacora->agencia }}</td>
                        <td>{{ $bitacora->encargadoOP }}</td>
                        <td>{{ $bitacora->temperatura }}</td>
                        <td>{{ $bitacora->humedad }}</td>
                        <td>{{ $bitacora->filtracion }}</td>
                        <td>{{ $bitacora->UPS }}</td>
                        <td>{{ $bitacora->generador }}</td>
                        <td>{{ $bitacora->observaciones }}</td>
                        <td>{{ $bitacora->Fecha }}</td>



                        <td>
                            <form action="{{ route('reportAlert')}}" target="_blank" method="GET">

                                <input name="agencia" type="hidden" class="form-control" id="formGroupExampleInput" value="{{ $bitacora->agencia}}">
                                <input class="btn btn-sm btn-flat btn-info bg-gradient-info" type="submit" value="ver registros">


                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>


            </table>

        </div>
        <hr>
    </div>
 
</div>

    @include('parametro.modal')
    @stop

    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    @stop

    @section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


    <script>
        $('#alertas').DataTable({
            "language": {
                "lengthMenu": "Mostrar " +
                    `<select class="custom-select custom-select-sm form-control form-control-sm"> 
            <option value ='10' >10</option>
            <option value ='25' >25</option>
            <option value ='50' >50</option>
            <option value ='100'>100</option>
            <option value ='-1' >all</option>
            </select>` +
                    " registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": 'Buscar:',
                "paginate": {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }
            }
        });
    </script>
    @stop