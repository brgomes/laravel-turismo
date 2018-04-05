<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;

class SiteController extends Controller
{

	public function index()
	{
		$title = 'Home page';
		$airports = Airport::with('city')->get();

		return view('site.home.index', compact('title', 'airports'));
	}

	public function promotions()
	{
		$title = 'Promoções';

		return view('site.promotions.list', compact('title'));
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

}
