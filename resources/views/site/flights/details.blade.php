@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Detalhes do voô {{$flight->id}}</h1>

        <ul>
			<li>
				Código: <strong>{{$flight->id}}</strong>
			</li>
			<li>
				Origem: <strong>{{$flight->origin->name}}</strong>
			</li>
			<li>
				Destino: <strong>{{$flight->destination->name}}</strong>
			</li>
			<li>
				Data: <strong>{{FormatDateAndTime($flight->date)}}</strong>
			</li>
			<li>
				Duração: <strong>{{FormatDateAndTime($flight->time_duration, 'H:i')}}</strong>
			</li>
			<li>
				Saída: <strong>{{FormatDateAndTime($flight->hour_output, 'H:i')}}</strong>
			</li>
			<li>
				Chegada: <strong>{{FormatDateAndTime($flight->arrival_time, 'H:i')}}</strong>
			</li>
			<li>
				Valor anterior: <strong>{{number_format($flight->old_price, 2, ',', '.')}}</strong>
			</li>
			<li>
				Valor: <strong>{{number_format($flight->price, 2, ',', '.')}}</strong>
			</li>
			<li>
				Total de parcelas: <strong>{{$flight->total_plots}}</strong>
			</li>
			<li>
				Promoção: <strong>{{$flight->is_promotion ? 'Sim' : 'Não'}}</strong>
			</li>
			<li>
				Paradas: <strong>{{$flight->qty_stops}}</strong>
			</li>
			<li>
				Descrição: <strong>{{$flight->description}}</strong>
			</li>
		</ul>

		{!! Form::open(['route' => 'reserve.flight']) !!}
			{!! Form::hidden('user_id', auth()->user()->id) !!}
			{!! Form::hidden('flight_id', $flight->id) !!}
			{!! Form::hidden('date_reserved', date('Y-m-d')) !!}
			{!! Form::hidden('status', 'reserved') !!}

			<button type="submit" class="btn btn-success">Reservar agora</button>
		{!! Form::close() !!}
    </section>

</div>

@endsection