@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('flights.index')}}" class="bred">Vôos</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Vôos</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => 'flights.search', 'class' => 'form form-inline', 'method' => 'get']) !!}
			{!! Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
			{!! Form::date('date', null, ['class' => 'form-control']) !!}
			{!! Form::time('hour_output', null, ['class' => 'form-control']) !!}
			{!! Form::number('total_stops', null, ['class' => 'form-control', 'placeholder' => 'Total de paradas']) !!}
			{!! Form::select('origin', $airports, null, ['class' => 'form-control']) !!}
			{!! Form::select('destination', $airports, null, ['class' => 'form-control']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm))
			<div class="alert alert-info">
				<a href="{{route('flights.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados da pesquisa
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<div class="class-btn-insert">
		<a href="{{route('flights.create')}}" class="btn-insert">
			<span class="glyphicon glyphicon-plus"></span>
			Cadastrar
		</a>
	</div>

	<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>Imagem</th>
			<th>Origem</th>
			<th>Destino</th>
			<th>Paradas</th>
			<th>Data</th>
			<th>Saída</th>
			<th width="150">Ações</th>
		</tr>

		@forelse($flights as $flight)
			<tr>
				<td>{{$flight->id}}</td>
				<td>
					@if($flight->imagem)
						<img src="{{url("storage/flights/{$flight->imagem}")}}" alt="{{$flight->id}}" style="max-width:60px">
					@else
						<img src="{{url("assets/panel/imgs/no-image.png")}}" alt="{{$flight->id}}" style="max-width:60px">
					@endif
				</td>
				<td>
					<a href="">{{$flight->origin->name}}</a>
				</td>
				<td>
					<a href="">{{$flight->destination->name}}</a>
				</td>
				<td>{{$flight->qty_stops}}</td>
				<td>{{FormatDateAndTime($flight->date)}}</td>
				<td>{{FormatDateAndTime($flight->hour_output, 'H:i')}}</td>
				<td>
					<a href="{{route('flights.edit', $flight->id)}}" class="edit">Edit</a>
					<a href="{{route('flights.show', $flight->id)}}" class="delete">View</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	<p>
		Total encontrado: <strong>{{$flights->total()}}</strong>
	</p>

	@if(isset($dataForm))
		{!! $flights->appends($dataForm)->links() !!}
	@else
		{!! $flights->links() !!}
	@endif
</div>

@endsection