<div class="form-search">
	{!! Form::open(['route' => 'reserves.search', 'class' => 'form form-inline', 'method' => 'get']) !!}
		{!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Detalhes do usuário']) !!}
		{!! Form::text('reserve', null, ['class' => 'form-control', 'placeholder' => 'Detalhes da reserva']) !!}
		{!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Data do vôo']) !!}
		{!! Form::select('status', $status, null, ['class' => 'form-control']) !!}

		<button class="btn btn-search">Pesquisar</button>
	{!! Form::close() !!}

	@if(isset($dataForm))
		<div class="alert alert-info">
			<a href="{{route('reserves.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
			Resultados da pesquisa
		</div>
	@endif
</div>