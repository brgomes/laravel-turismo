<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\User;
use App\Models\Flight;

class ReserveController extends Controller
{

    private $_reserve;
    private $_totalPage = 5;

    public function __construct(Reserve $reserve)
    {
        $this->_reserve = $reserve;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Reservas de passagens aéreas';
        $reserves = $this->_reserve->with(['user', 'flight.origin', 'flight.destination'])->paginate($this->_totalPage);

        return view('panel.reserves.index', compact('title', 'reserves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova reserva';

        $users = User::pluck('name', 'id');
        $flights = Flight::pluck('id', 'id');
        $status = $this->_reserve->status();

        return view('panel.reserves.create', compact('title', 'users', 'flights', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->_reserve->create($request->all())) {
            return redirect()->route('reserves.index')->with('success', 'Reserva cadastrada com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao reservar')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = $this->_reserve->with(['user', 'flight'])->find($id);

        if (!$reserve) {
            return redirect()->back();
        }

        $user = $reserve->user;
        $flight = $reserve->flight;
        $status = $this->_reserve->status();

        $title = 'Editar reserva do usuário: ' . $user->name;

        return view('panel.reserves.edit', compact('title', 'reserve', 'user', 'flight', 'status'));
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
        $reserve = $this->_reserve->with(['user', 'flight'])->find($id);

        if (!$reserve) {
            return redirect()->back();
        }

        if ($reserve->update($request->all())) {
            return redirect()->route('reserves.index')->with('success', 'Status alterado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao alterar o status')->withInput();
    }

}
