@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('brands.index')}}" class="bred">Marcas</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Marcas de aviões</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) !!}
			{!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm))
			<div class="alert alert-info">
				<a href="{{route('brands.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados para: <strong>{{$dataForm['key_search']}}</strong>
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<div class="class-btn-insert">
		<a href="{{route('brands.create')}}" class="btn-insert">
			<span class="glyphicon glyphicon-plus"></span>
			Cadastrar
		</a>
	</div>

	<table class="table table-striped">
		<tr>
			<th>Nome</th>
			<th width="180">Ações</th>
		</tr>

		@forelse($brands as $brand)
			<tr>
				<td>{{$brand->name}}</td>
				<td>
					<a href="{{route('brands.edit', $brand->id)}}" class="edit">Edit</a>
					<a href="{{route('brands.show', $brand->id)}}" class="delete">View</a>
					<a href="{{route('brands.planes', $brand->id)}}" class="edit">
						<i class="fa fa-plane" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	<p>
		Total encontrado: <strong>{{$brands->total()}}</strong>
	</p>

	@if(isset($dataForm))
		{!! $brands->appends($dataForm)->links() !!}
	@else
		{!! $brands->links() !!}
	@endif
</div>

@endsection