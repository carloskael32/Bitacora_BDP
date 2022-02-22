@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<br>

<div class="card shadow">

	<div class="card-body">

		<div id="container">
		</div>

	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="small-box bg-gradient-success">


			<div class="inner">
				@foreach ($totalag as $agt)
				<h3>{{ $agt->totalag }}</h3>
				@endforeach
				<p>Agencias registradas</p>
			</div>
			<div class="icon">
				<span class="iconify" data-icon="ion:stats-chart"></span>
			</div>
			<a href="{{ route('PDFindexb') }}"  target="_blank" class="small-box-footer">
				mas información <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>

	</div>


	
	<div class="col-md-4">
		<div class="small-box bg-gradient-cyan">


			<div class="inner">
				@foreach ($totalge as $agt)
				<h3>{{ $agt->totalge }}</h3>
				@endforeach
				<p>Pruebas de generadores</p>
			</div>
			<div class="icon">
			<span class="iconify" data-icon="arcticons:coinstats"></span>
			</div>
			<a href="{{ route('PDFindexg') }}" target="_blank" class="small-box-footer">
				mas información <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="small-box bg-gradient-blue">


			<div class="inner">
				@foreach ($totalu as $us)
				<h3>{{ $us->totalus }}</h3>
				@endforeach
				<p>Administradores</p>
			</div>
			<div class="icon">
			<span class="iconify" data-icon="entypo:users"></span>
			</div>
			<a href="{{ url('/user') }}"  class="small-box-footer">
				mas información <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script>  -->

<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>


<script>
	// Create the chart
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Resumen mensual. <?php setlocale(LC_ALL, 'spanish');echo strftime('%B del %Y'); ?>'},
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
				text: 'Porcentaje total del mes'
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