@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('brands.index')}}" class="bred">Marcas ></a>
    <a href="" class="bred">Gestão</a>
</div>

<a href="{{route('brands.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">Gestão de marcas de avião</h1>
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

	@if(isset($brand))
		<!--<form class="form form-search form-ds" action="{{route('brands.update', $brand->id)}}" method="post">-->
		{!! Form::model($brand, ['route' => ['brands.update', $brand->id], 'class' => 'form form-search form-ds', 'method' => 'put']) !!}
	@else
		<!--<form class="form form-search form-ds" action="{{route('brands.store')}}" method="post">-->
		{!! Form::open(['route' => 'brands.store', 'class' => 'form form-search form-ds']) !!}
	@endif
	
		<div class="form-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
		</div>

		<div class="form-group">
			<button class="btn btn-search">Enviar</button>
		</div>
	{!! Form::close() !!}
</div>

@endsection