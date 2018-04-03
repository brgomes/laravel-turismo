<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class CityController extends Controller
{

	private $_totalPage = 15;

	public function index($initials)
	{
		$state = State::where('initials', $initials)->get()->first();

		if (!$state) {
			redirect()->back();
		}

		$title = 'Cidades de ' . $state->name;
		$cities = $state->cities()->paginate($this->_totalPage);

		return view('panel.cities.index', compact('title', 'state', 'cities'));
	}

	public function search(Request $request, $initials)
	{
		$state = State::where('initials', $initials)->get()->first();

		if (!$state) {
			redirect()->back();
		}

		$dataForm = $request->all();
		$keySearch = $request->key_search;
		$cities = $state->searchCities($keySearch, $this->_totalPage);
		$title = 'Filtro: Cidades de ' . $state->name;

		return view('panel.cities.index', compact('title', 'state', 'cities', 'dataForm'));
	}

}
