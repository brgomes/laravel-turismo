@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home  ></a> <a href="" class="bred">Dashboard</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Home page</h1>
</div>

<div class="content-din">
	
	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-university" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalBrands}}
				</h2>
				<h3 class="result-ds">
					Total de marcas
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-plane" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalPlanes}}
				</h2>
				<h3 class="result-ds">
					Total de aviões
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-globe" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalStates}}
				</h2>
				<h3 class="result-ds">
					Total de estados
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalCities}}
				</h2>
				<h3 class="result-ds">
					Total de cidades
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-thumb-tack" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalAirports}}
				</h2>
				<h3 class="result-ds">
					Total de aeroportos
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-fighter-jet" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalFlights}}
				</h2>
				<h3 class="result-ds">
					Total de vôos
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-users" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalUsers}}
				</h2>
				<h3 class="result-ds">
					Total de usuários
				</h3>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-4 col-xm-12">
		<div class="rel-dash">
			<i class="fa fa-check-square" aria-hidden="true"></i>
			<div class="text-rel">
				<h2 class="result">
					{{$totalReserves}}
				</h2>
				<h3 class="result-ds">
					Total de reservas
				</h3>
			</div>
		</div>
	</div>

</div>

@endsection