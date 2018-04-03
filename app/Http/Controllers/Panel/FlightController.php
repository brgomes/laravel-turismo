<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Airport;

class FlightController extends Controller
{

    private $_flight;
    private $_totalPage = 5;

    public function __construct(Flight $flight)
    {
        $this->_flight = $flight;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Vôos disponíveis';
        $flights = $this->_flight->getItens($this->_totalPage);

        return view('panel.flights.index', compact('title', 'flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar vôos';

        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');

        return view('panel.flights.create', compact('title', 'planes', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $filename = uniqid(date('HisYmd')) . '.' . $request->imagem->extension();

            if (!$request->imagem->storeAs('flights', $filename)) {
                return redirec()->back()->with('error', 'Falha ao fazer upload')->withInput();
            }
        }

        if ($this->_flight->newFlight($request, $filename)) {
            return redirect()->route('flights.index')->with('success', 'Sucesso ao cadastrar');
        }

        return redirect()->back()->with('error', 'Falha ao cadastrar')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = $this->_flight->with(['origin', 'destination'])->find($id);

        if (!$flight) {
            return redirect()->back();
        }

        $title = 'Detalhes do vôo ' . $flight->id;

        return view('panel.flights.show', compact('flight', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flight = $this->_flight->find($id);

        if (!$flight) {
            return redirect()->back();
        }

        $title = 'Editar vôo: ' . $flight->id;
        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');

        return view('panel.flights.edit', compact('title', 'flight', 'planes', 'airports'));
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
        $flight = $this->_flight->find($id);

        if (!$flight) {
            return redirect()->back();
        }

        if ($flight->update($request->all())) {
            return redirect()->route('flights.index')->with('success', 'Sucesso ao alterar');
        }

        return redirect()->back()->with('error', 'Falha ao alterar')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_flight->find($id)->delete();

        return redirect()->route('flights.index')->with('success', 'Sucesso ao deletar');
    }
}
