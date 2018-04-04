@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('users.index')}}" class="bred">Usuários</a>
</div>

<div class="title-pg">
	<h1 class="title-pg">Usuários</h1>
</div>

<div class="content-din bg-white">
	<div class="form-search">
		{!! Form::open(['route' => 'users.search', 'class' => 'form form-inline', 'method' => 'get']) !!}
			{!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja pesquisar?']) !!}

			<button class="btn btn-search">Pesquisar</button>
		{!! Form::close() !!}

		@if(isset($dataForm['key_search']))
			<div class="alert alert-info">
				<a href="{{route('users.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				Resultados da pesquisa: {{$dataForm['key_search']}}
			</div>
		@endif
	</div>

	<div class="messages">
		@include('panel.includes.alerts')
	</div>

	<div class="class-btn-insert">
		<a href="{{route('users.create')}}" class="btn-insert">
			<span class="glyphicon glyphicon-plus"></span>
			Cadastrar
		</a>
	</div>

	<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>Imagem</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>É admin</th>
			<th width="150">Ações</th>
		</tr>

		@forelse($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>
					@if($user->image)
						<img src="{{url("storage/users/{$user->image}")}}" alt="{{$user->id}}" style="max-width:60px">
					@else
						<img src="{{url("assets/panel/imgs/no-image.png")}}" alt="{{$user->id}}" style="max-width:60px">
					@endif
				</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->is_admin ? 'Sim' : 'Não'}}</td>
				<td>
					<a href="{{route('users.edit', $user->id)}}" class="edit">Edit</a>
					<a href="{{route('users.show', $user->id)}}" class="delete">View</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="200">Nenhum item cadastrado</td>
			</tr>
		@endforelse
	</table>

	<p>
		Total encontrado: <strong>{{$users->total()}}</strong>
	</p>

	@if(isset($dataForm))
		{!! $users->appends($dataForm)->links() !!}
	@else
		{!! $users->links() !!}
	@endif
</div>

@endsection