@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('brands.index')}}" class="bred">Marcas ></a>
    <a href="" class="bred">{{$brand->name}}</a>
</div>

<a href="{{route('brands.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">{{$brand->name}}</h1>
</div>

<div class="content-din">
	<ul>
		<li>
			Nome: <strong>{{$brand->name}}</strong>
		</li>
	</ul>

	@include('panel.includes.alerts')

	{!! Form::open(['route' => ['brands.destroy', $brand->id], 'class' => 'form form-search form-ds', 'method' => 'delete']) !!}	
		<div class="form-group">
			<button class="btn btn-danger">Deletar a marca {{$brand->name}}</button>
		</div>
	{!! Form::close() !!}
</div>

@endsection