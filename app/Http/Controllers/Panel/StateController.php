<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{

	private $_state;

	public function __construct(State $state)
	{
		$this->_state = $state;
	}

	public function index()
	{
		$title = 'Exibição dos estados brasileiros';
		$states = $this->_state->get();

		return view('panel.states.index', compact('title', 'states'));
	}

	public function search(Request $request)
	{
		$dataForm = $request->all();
		$keySearch = $request->key_search;
		$states = $this->_state->search($keySearch);
		$title = 'Resultados de estado: ' . $keySearch;

		return view('panel.states.index', compact('title', 'states', 'dataForm'));
	}

}
