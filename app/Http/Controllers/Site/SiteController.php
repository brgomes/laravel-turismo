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

	public function search(Request $request)
	{
		$title = 'Resultado da pesquisa';
		$origin = getInfoAirport($request->origin);
		$destination = getInfoAirport($request->destination);
		$flights = Flights::searchFlights($origin['id_city'], $destination['id_city'], $request->$date);

		return view('site.results.search', compact('title', 'flights'));
	}

}
