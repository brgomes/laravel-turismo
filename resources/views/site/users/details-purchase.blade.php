@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Detalhes da reserva</h1>
        <ul class="list-group">
            <li class="list-group-item">
                Código: {{$reserve->id}}
            </li>
            <li class="list-group-item">
                Data: <strong>{{FormatDateAndTime($reserve->date_reserved)}}</strong>
            </li>
            <li class="list-group-item">
                Status: <strong>{{$reserve->status($reserve->status)}}</strong>
            </li>
        </ul>

        <h1 class="title">Detalhes do vôo</h1>
        <ul class="list-group">
            <li class="list-group-item">
                Data: <strong>{{FormatDateAndTime($reserve->flight->date)}}</strong>
            </li>
            <li class="list-group-item">
                Origem: <strong>{{$reserve->flight->origin->city->name}}</strong>
            </li>
            <li class="list-group-item">
                Destino: <strong>{{$reserve->flight->destination->city->name}}</strong>
            </li>
            <li class="list-group-item">
                Saída: <strong>{{FormatDateAndTime($reserve->flight->hour_output, 'H:i')}}</strong>
            </li>
            <li class="list-group-item">
                Chegada: <strong>{{FormatDateAndTime($reserve->flight->arrival_time, 'H:i')}}</strong>
            </li>
            <li class="list-group-item">
                Preço: <strong>R$ {{number_format($reserve->flight->price, 2, ',', '.')}}</strong>
            </li>
        </ul>
    </section>

</div>

@endsection