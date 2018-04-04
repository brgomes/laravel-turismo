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
        $cities = $this->_city->pluck('name', 'id');

        return view('panel.airports.create', compact('title', 'city', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
