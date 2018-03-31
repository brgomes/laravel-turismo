@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="" class="bred">Marcas</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Marcas de aviões</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		<form class="form form-inline">
			<input type="text" name="nome" placeholder="Nome" class="form-control">
			<button class="btn btn-search">Pesquisar</button>
		</form>
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
			<th width="150">Ações</th>
		</tr>

		@forelse($brands as $brand)
			<tr>
				<td>{{$brand->name}}</td>
				<td>
					<a href="#" class="edit">Edit</a>
					<a href="#" class="delete">Delete</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>
</div>

@endsection