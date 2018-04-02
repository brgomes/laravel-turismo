@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('brands.index')}}" class="bred">Marcas ></a>
    <a href="{{route('brands.create')}}" class="bred">Cadastrar</a>
</div>

<a href="{{route('brands.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">Cadastrar marcas de aviões</h1>
</div>

<div class="content-din">
	@if(isset($errors) && $errors->any())
		<div class="alert alert-warning">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form class="form form-search form-ds" action="{{route('brands.store')}}" method="post">
		<div class="form-group">
			<input type="text" name="name" placeholder="Nome" class="form-control">
		</div>

		<div class="form-group">
			{!! csrf_field() !!}
			<button class="btn btn-search">Enviar</button>
		</div>
	</form>
</div>

@endsection