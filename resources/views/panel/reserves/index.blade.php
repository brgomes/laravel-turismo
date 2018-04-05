@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('reserves.index')}}" class="bred">Reservas</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Reservas</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => 'planes.search', 'class' => 'form form-inline']) !!}
			{!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm))
			<div class="alert alert-info">
				<a href="{{route('planes.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados para: <strong>{{$dataForm['key_search']}}</strong>
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<div class="class-btn-insert">
		<a href="{{route('reserves.create')}}" class="btn-insert">
			<span class="glyphicon glyphicon-plus"></span>
			Fazer nova reserva
		</a>
	</div>

	<table class="table table-striped">
		<tr>
			<th>#id</th>
			<th>Usuário</th>
			<th>Vôo</th>
			<th>Status</th>
			<th width="150">Ações</th>
		</tr>

		@forelse($reserves as $reserve)
			<tr>
				<td>{{$reserve->id}}</td>
				<td>{{$reserve->user->name}}</td>
				<td>De <strong>{{$reserve->flight->origin->name}}</strong> para <strong>{{$reserve->flight->destination->name}}</strong> em {{formatDateAndTime($reserve->date_reserved)}}</td>
				<td>{{$reserve->status($reserve->status)}}</td>
				<td>
					<a href="{{route('reserves.edit', $reserve->id)}}" class="edit">Edit</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	<p>
		Total encontrado: <strong>{{$reserves->total()}}</strong>
	</p>

	@if(isset($dataForm))
		{!! $reserves->appends($dataForm)->links() !!}
	@else
		{!! $reserves->links() !!}
	@endif
</div>

@endsection