@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('planes.index')}}" class="bred">Aviões ></a>
    <a href="" class="bred">#{{$plane->id}}</a>
</div>

<a href="{{route('planes.create')}}" class="btn btn-success">
	<i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
	<h1 class="title-pg">Avião #{{$plane->id}}</h1>
</div>

<div class="content-din">
	<ul>
		<li>
			Código: <strong>{{$plane->id}}</strong>
		</li>
		<li>
			Classe: <strong>{{$plane->classes($plane->class)}}</strong>
		</li>
		<li>
			Marca: <strong>{{$brand}}</strong>
		</li>
		<li>
			Qtde passageiros: <strong>{{$plane->qty_passengers}}</strong>
		</li>
	</ul>

	@include('panel.includes.alerts')

	{!! Form::open(['route' => ['planes.destroy', $plane->id], 'class' => 'form form-search form-ds', 'method' => 'delete']) !!}	
		<div class="form-group">
			<button class="btn btn-danger">Deletar o avião #{{$plane->id}}</button>
		</div>
	{!! Form::close() !!}
</div>

@endsection