@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<h5>Hi <strong>{{ Auth::user()->name }}</h5>
				</div>
				<div class="card-body">
					

					<hr>
					<div id="container">

					</div>



				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
	// Create the chart
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Resumen mensual. <?php setlocale(LC_ALL, 'spanish'); echo strftime(' %B del %Y'); ?>'
			//setlocale(LC_ALL, 'spanish'); echo strftime('%d de %B del %Y');
		},
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
			data: <?= $data ?>


		}],

	});
</script>
@endsection