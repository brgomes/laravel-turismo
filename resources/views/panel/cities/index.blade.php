@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('states.index')}}" class="bred">Estados ></a>
    <a href="{{route('state.cities', $state->initials)}}" class="bred">{{$state->name}} ></a>
    <a href="" class="bred">Cidades</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Cidades de {{$state->name}}</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => ['state.cities.search', $state->initials], 'class' => 'form form-inline', 'method' => 'get']) !!}
			{!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm))
			<div class="alert alert-info">
				<a href="{{route('state.cities', $state->initials)}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados para: <strong>{{$dataForm['key_search']}}</strong>
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<table class="table table-striped">
		<tr>
			<th>Nome</th>
			<th>Zip code</th>
			<th width="150">Ações</th>
		</tr>

		@forelse($cities as $city)
			<tr>
				<td>{{$city->name}}</td>
				<td>{{$city->zip_code}}</td>
				<td>
					<a href="{{route('airports.index', $city->id)}}" class="edit">
						<i class="fa fa-thumb-tack" aria-hidden="true"></i>
						Aeroportos
					</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	@if(isset($dataForm))
		{!! $cities->appends($dataForm)->links() !!}
	@else
		{!! $cities->links() !!}
	@endif

	<p>
		Total encontrado: <strong>{{$cities->total()}}</strong>
	</p>
</div>

@endsection