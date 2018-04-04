<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Airport;

class AirportController extends Controller
{

    private $_city;
    private $_airport;
    private $_totalPage = 5;

    public function __construct(City $city, Airport $airport)
    {
        $this->_city = $city;
        $this->_airport = $airport;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCity)
    {
        $city = $this->_city->find($idCity);

        if (!$city) {
            return redirect()->back();
        }

        $title = 'Aeroportos de ' . $city->name;
        $airports = $city->airports()->paginate($this->_totalPage);

        return view('panel.airports.index', compact('city', 'title', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCity)
    {
        $city = $this->_city->find($idCity);

        if (!$city) {
            return redirect()->back();
        }

        $title = 'Cadastrar novo aeroporto para ' . $city->name;

        return view('panel.airports.create', compact('title', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idCity)
    {
        $city = $this->_city->find($idCity);

        if (!$city) {
            return redirect()->back();
        }

        if ($city->airports()->create($request->all())) {
            return redirect()->route('airports.index', $city->id)->with('success', 'Aeroporto cadastrado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao cadastrar')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCity, $idAirport)
    {
        $airport = $this->_airport->with('city')->find($idAirport);

        if (!$airport) {
            return redirect()->back();
        }

        $city = $airport->city;
        $title = 'Aeroporto ' . $airport->name . ' - ' . $city->name;

        return view('panel.airports.show', compact('title', 'airport', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCity, $idAirport)
    {
        $airport = $this->_airport->with('city')->find($idAirport);

        if (!$airport) {
            return redirect()->back();
        }

        $title = 'Editar aeroporto ' . $airport->name;
        $city = $airport->city;

        return view('panel.airports.edit', compact('title', 'city', 'airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCity, $idAirport)
    {
        $airport = $this->_airport->find($idAirport);

        if (!$airport) {
            return redirect()->back();
        }

        if ($airport->update($request->all())) {
            return redirect()->route('airports.index', $airport->city_id)->with('success', 'Aeroporto editado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao editar')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCity, $idAirport)
    {
        $airport = $this->_airport->with('city')->find($idAirport);

        if (!$airport) {
            return redirect()->back();
        }

        if ($airport->delete()) {
            return redirect()->route('airports.index', $airport->city_id)->with('success', 'Aeroporto deletado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao deletar')->withInput();
    }

    public function search($idCity, Request $request)
    {
        $city = $this->_city->find($idCity);

        if (!$city) {
            return redirect()->back();
        }

        $title = 'Aeroportos da cidade ' . $city->name;

        $airports = $this->_airport->search($city, $request, $this->_totalPage);

        $dataForm = $request->except('_token');

        return view('panel.airports.index', compact('title', 'airports', 'city', 'dataForm'));
    }

}
