@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('planes.index')}}" class="bred">Aviões ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<a href="{{route('brands.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">Cadastrar avião</h1>
</div>

<div class="content-din">
	@include('panel.includes.errors')

	{!! Form::open(['route' => 'brands.store', 'class' => 'form form-search form-ds']) !!}
		@include('panel.planes.form')
	{!! Form::close() !!}
</div>

@endsection