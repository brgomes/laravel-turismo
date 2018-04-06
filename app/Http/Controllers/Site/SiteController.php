<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Reserve;
use App\Http\Requests\StoreReserveFormRequest;
use App\User;

class SiteController extends Controller
{

	public function index()
	{
		$title = 'Home page';
		$airports = Airport::with('city')->get();

		return view('site.home.index', compact('title', 'airports'));
	}

	public function promotions(Flight $flight)
	{
		$title = 'Promoções';
		$flights = $flight->promotions();

		return view('site.promotions.list', compact('title', 'flights'));
	}

	public function search(Request $request, Flight $flight)
	{
		$title = 'Resultado da pesquisa';
		$origin = getInfoAirport($request->origin);
		$destination = getInfoAirport($request->destination);
		$flights = $flight->searchFlights($origin['id_airport'], $destination['id_airport'], $request->date);

		return view('site.search.search', [
			'title' 		=> $title,
			'flights' 		=> $flights,
			'origin' 		=> $origin['name_city'],
			'destination' 	=> $destination['name_city'],
			'date' 			=> FormatDateAndTime($request->date)
		]);
	}

	public function detailsFlight($idFlight)
	{
		$flight = Flight::with(['origin', 'destination'])->find($idFlight);

        if (!$flight) {
            return redirect()->back();
        }

        $title = 'Detalhes do vôo ' . $flight->id;

        return view('site.flights.details', compact('title', 'flight'));
	}

	public function reserveFlight(StoreReserveFormRequest $request, Reserve $reserve)
	{
		if ($reserve->newReserve($request->flight_id)) {
			return redirect()->route('my.purchases')->with('success', 'Reserva realizada com sucesso');
		}

		return redirect()->back()->with('error', 'Falha ao reservar');
	}

	public function myPurchases()
	{
		$title = 'Minhas compras';
		$purchases = auth()->user()->reserves()->with('flight')->get();

		return view('site.users.purchases', compact('title', 'purchases'));
	}

}
