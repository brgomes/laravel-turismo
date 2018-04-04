@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('users.index')}}" class="bred">Usuários ></a>
    <a href="" class="bred">{{$user->name}}</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Detalhes do usuário</h1>
</div>

<div class="content-din">
	<ul>
		<li>
			Código: <strong>{{$user->id}}</strong>
		</li>
		<li>
			Nome: <strong>{{$user->name}}</strong>
		</li>
		<li>
			E-mail: <strong>{{$user->email}}</strong>
		</li>
		<li>
			Admin: <strong>{{$user->is_admin ? 'Sim' : 'Não'}}</strong>
		</li>
	</ul>

	@include('panel.includes.alerts')

	{!! Form::open(['route' => ['users.destroy', $user->id], 'class' => 'form form-search form-ds', 'method' => 'delete']) !!}	
		<div class="form-group">
			<button class="btn btn-danger">Deletar o usuário {{$user->name}}</button>
		</div>
	{!! Form::close() !!}
</div>

@endsection