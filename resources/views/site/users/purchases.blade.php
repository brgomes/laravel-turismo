@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Minhas compras</h1>

        <table class="table">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Vôo</th>
                    <th>Data</th>
                    <th width="100">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $reserve)
	                <tr>
	                    <td>{{$reserve->id}}</td>
	                    <td>
	                        <a href="{{route('purchase.detail', $reserve->id)}}" class="badge badge-light">
	                            Ver detalhes da reserva #{{$reserve->id}}
	                            <i class="fa fa-info-circle" aria-hidden="true"></i>
	                        </a>
	                    </td>
	                    <td>{{FormatDateAndTime($reserve->flight->date)}}</td>
	                    <td>
	                        <span class="badge badge-secondary">{{$reserve->status($reserve->status)}}</span>
	                    </td>
	                </tr>
               @empty
               @endforelse
            </tbody>
        </table>
    </section>

</div>

@endsection
