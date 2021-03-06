@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Resultados pesquisa:</h1>
        <div class="key-search row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-12 text-center">
                <img src="{{url('assets/site/images/flight.png')}}" alt="Voô">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                <p>De: <span>{{$origin}}</span></p>
                <p>Para: <span>{{$destination}}</span></p>
                <p>Data: <span>{{$date}}</span></p>
            </div>
        </div>


        <div class="row results-search">
            @forelse($flights as $flight)
	            <article class="result-search col-12">

	                <span>Saída: <strong>{{FormatDateAndTime($flight->hour_output, 'H:i')}}</strong></span>
	                <span>Chegada: <strong>{{FormatDateAndTime($flight->arrival_time, 'H:i')}}</strong></span>
	                <span>Paradas: <strong>{{$flight->qty_stops}}</strong></span>
	                <a href="{{route('details.flight', $flight->id)}}">Detalhes</a>

	            </article>
            @empty
                
            @endforelse
        </div>
    </section>

</div>

@endsection