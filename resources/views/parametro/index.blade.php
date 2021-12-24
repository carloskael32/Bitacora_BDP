@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">





    <div class="row justify-content-center">



        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Parametros</h2>
                </div>
                <div class="card-body">



                    <table class=" table table-light">

                        <thead class="thead-light text-center">
                            <tr>

                                <th>temmin</th>
                                <th>temmax</th>

                                <th>hummin</th>
                                <th>hummax</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">


                            @foreach( $dtpa as $dp)

                            <tr>

                                <td>{{ $dp->temmin }}</td>
                                <td>{{ $dp->temmax }}</td>
                                <td>{{ $dp->hummin }}</td>
                                <td>{{ $dp->hummax }}</td>





                            </tr>
                            @endforeach
                        </tbody>

                    </table>








                </div>
            </div>
        </div>
    </div>
</div>




@endsection