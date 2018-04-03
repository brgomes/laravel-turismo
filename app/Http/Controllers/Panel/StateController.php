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

}
