@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home  ></a>
    <a href="{{route('flights.index')}}" class="bred">Vôos ></a>
    <a href="" class="bred">Editar</a>
</div>

<a href="{{route('flights.create')}}" class="btn btn-success">
    <i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
</a>

<div class="title-pg">
    <h1 class="title-pg">Editar vôo #{{$flight->id}}</h1>
</div>

<div class="content-din">
    @include('panel.includes.errors')

    {!! Form::model($flight, ['route' => ['flights.update', $flight->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'put']) !!}
        @include('panel.flights.form')
    {!! Form::close() !!}
</div>

@endsection