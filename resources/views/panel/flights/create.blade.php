@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('flights.index')}}" class="bred">Vôos ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<a href="{{route('flights.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">Cadastrar vôo</h1>
</div>

<div class="content-din">
	@include('panel.includes.errors')

	{!! Form::open(['route' => 'flights.store', 'class' => 'form form-search form-ds', 'files' => true]) !!}
		@include('panel.flights.form')
	{!! Form::close() !!}
</div>

@endsection