@extends('site.layouts.app')

@section('content-site')

<div class="content">
    <section class="container">
        <h1 class="title">Promoções</h1>

        <div class="row">
            @forelse($flights as $flight)
                <article class="result col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="image-promo">
                        <img src="{{url("storage/flights/{$flight->imagem}")}}" alt="{{$flight->id}}">

                        <div class="legend">
                            <h1>{{$flight->origin->city->name}}</h1>
                            <h2>Saída: {{$flight->destination->city->name}}</h2>
                            <span>Ida</span>
                        </div>
                    </div>

                    <div class="details">
                        <p>Data: {{FormatDateAndTime($flight->date)}}</p>

                        <div class="price">
                            <span>R$ {{number_format($flight->price, 2, ',', '.')}}</span>
                            <strong>Em até {{$flight->total_plots}}x</strong>
                        </div>

                        <a href="{{route('details.flight', $flight->id)}}" class="btn btn-buy">Visualizar</a>
                    </div>

                </article>
            @empty
                <p>Nenhuma promoção cadastrada.</p>
            @endforelse
        </div>
    </section>

</div>

@endsection