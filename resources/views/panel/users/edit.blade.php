@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('users.index')}}" class="bred">Usuários ></a>
    <a href="" class="bred">Editar</a>
</div>

<a href="{{route('users.create')}}" class="btn btn-success">
    <i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
    <h1 class="title-pg">Editar usuário: {{$user->name}}</h1>
</div>

<div class="content-din">
    @include('panel.includes.errors')

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'put']) !!}
        @include('panel.users.form')
    {!! Form::close() !!}
</div>

@endsection