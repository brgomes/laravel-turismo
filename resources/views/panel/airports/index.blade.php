@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('states.index')}}" class="bred">Estados ></a>
    <a href="{{route('state.cities', $city->state->initials)}}" class="bred">{{$city->state->name}} ></a>
    <a href="{{route('state.cities', $city->state->initials)}}" class="bred">{{$city->name}} ></a>
    <a href="{{route('airports.index', $city->id)}}" class="bred">Aeroportos</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Aeroportos de {{$city->name}}</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) !!}
			{!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm))
			<div class="alert alert-info">
				<a href="{{route('airports.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados para: <strong>{{$dataForm['key_search']}}</strong>
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<div class="class-btn-insert">
		<a href="{{route('airports.create', $city->id)}}" class="btn-insert">
			<span class="glyphicon glyphicon-plus"></span>
			Cadastrar
		</a>
	</div>

	<table class="table table-striped">
		<tr>
			<th>Nome</th>
			<th>Endereço</th>
			<th width="150">Ações</th>
		</tr>

		@forelse($airports as $airport)
			<tr>
				<td>{{$airport->name}}</td>
				<td>{{$airport->address}}</td>
				<td>
					<a href="{{route('airports.edit', [$city->id, $airport->id])}}" class="edit">Edit</a>
					<a href="{{route('airports.show', [$city->id, $airport->id])}}" class="delete">View</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	<p>
		Total encontrado: <strong>{{$airports->total()}}</strong>
	</p>

	@if(isset($dataForm))
		{!! $airports->appends($dataForm)->links() !!}
	@else
		{!! $airports->links() !!}
	@endif
</div>

@endsection