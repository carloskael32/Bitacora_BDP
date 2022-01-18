

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="container-fluid	">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-body">
				
					<div id="container">
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<hr>
<div class="container-fluid">
	<div class="row">



		<div class="col-md-6">
			<div class="card">
				<table class="table table-striped text-center">
					<thead>
						<tr>
							<th colspan="3">
								<h4>Reportes de CPD´s</h4>
							</th>
						</tr>
						<tr>

							<th scope="col">#</th>
							<th scope="col">Agencias</th>
							<th scope="col">Nro. de Registros</th>

						</tr>
					</thead>
					<tbody>
						@php
						$a = 1;
						@endphp
						@foreach ($registros as $regis)
						<tr>
							<th scope="row">{{ $a }}</th>
							<td>{{ $regis->agencia }}</td>
							<td>{{ $regis->total }}</td>

						</tr>

						@php
						$a++;
						@endphp
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
		<div class="col-md-6">
			<div class="card">

			
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th colspan="3">
							<h4>Reportes de Generadores</h4>
						</th>
					</tr>
					<tr>

						<th scope="col">#</th>
						<th scope="col">Agencias</th>
						<th scope="col">Fecha de Prueba</th>

					</tr>
				</thead>
				<tbody>
					@php
					$a = 1;
					@endphp
					@foreach ($generador as $gen)
					<tr>
						<th scope="row">{{ $a }}</th>
						<td>{{ $gen->agencia }}</td>
						<td>{{ $gen->fecha }}</td>

					</tr>

					@php
					$a++;
					@endphp
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->

<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
	// Create the chart
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Resumen mensual. <?php setlocale(LC_ALL, 'spanish'); echo strftime('%B del %Y'); ?>'
		},
		//setlocale(LC_ALL, 'spanish'); echo strftime('%d de %B del %Y');

		/* 	subtitle: {
				text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
			}, */
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total percent market share'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y:.1f}%'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
		},

		series: [{
			name: "Agencias",
			colorByPoint: true,
			data: <?= $datos1 ?>


		}],

	});
</script>
@stop