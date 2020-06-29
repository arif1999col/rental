@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="content">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <div class="content">
					<div class="row">
						<div class="col-lg-4">
							<div class="card bg-teal-400">
								<div class="card-body">
									<div class="d-flex">
										<h3 class="font-weight-semibold mb-0">{{$count = DB::table('cars')->count()}}</h3>
									</div>
									<div>
										JUMLAH MOBIL
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card bg-teal-400">
								<div class="card-body">
									<div class="d-flex">
										<h3 class="font-weight-semibold mb-0">{{$count = DB::table('users')->count()}}</h3>
									</div>
									<div>
										Karyawan
									</div>
								</div>
							</div>
                        </div>
                        <div class="col-lg-4">
							<div class="card bg-teal-400">
								<div class="card-body">
									<div class="d-flex">
										<h3 class="font-weight-semibold mb-0">{{$count = DB::table('clients')->count()}}</h3>
									</div>
									<div>
										Client
									</div>
								</div>
							</div>
						</div>
					</div>
                    @yield('content')
                </div>
                <div class="content">
					<div class="row">
						<div class="col-lg-12">
							<div class="card bg-teal-400">
								<div class="card-body">
									<div class="d-flex">
										<h3 class="font-weight-semibold mb-0">{{$count = DB::table('bookings')->where('return_date', NULL)->count()}}</h3>
									</div>
									<div>
										JUMLAH MOBIL YANG DI BOOKINGS
									</div>
								</div>
							</div>
						</div>
					</div>
                    @yield('content')
                </div>
                <div class="content">
					<div class="row">
						<div class="col-lg-12">
							<div class="card bg-teal-400">
								<div class="card-body">
                                    <div>
										JUMLAH PEMASUKAN
									</div>
									<div class="d-flex">
										<h3 class="font-weight-semibold mb-0">{{$price = DB::table('bookings')->whereNotNull('return_date')->sum('price')}}</h3>
									</div>
									
								</div>
							</div>
						</div>
					</div>
                    @yield('content')
                </div>
            </div>
            <div id="container">

            </div>
        </div>
    </section>
    
    @section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <script>
        Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Pengunaan Mobil'
    },
    xAxis: {
        categories: 
         {!!json_encode($categorie)!!}
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Penggunaan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        data: {!!json_encode($data)!!}
    }]
});
    </script>
    @endsection
@endsection
