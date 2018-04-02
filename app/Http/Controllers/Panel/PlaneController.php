<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plane;
use App\Models\Brand;
use App\Http\Requests\PlaneStoreUpdateFormRequest;

class PlaneController extends Controller
{

    private $_plane;
    private $_totalPage = 3;

    public function __construct(Plane $plane)
    {
        $this->_plane = $plane;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem de aviões';

        $planes = $this->_plane->with('brand')->paginate($this->_totalPage);

        return view('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo avião';
        $classes = $this->_plane->classes();
        $brands = Brand::pluck('name', 'id');

        return view('panel.planes.create', compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->_plane->create($dataForm);

        if ($insert) {
            return redirect()->route('planes.index')->with('success', 'Sucesso ao cadastrar');
        }

        return redirect()->back()->with('error', 'Falha ao cadastrar');
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
        $plane = $this->_plane->find($id);

        if (!$plane) {
            return redirect()->back();
        }

        $classes = $this->_plane->classes();
        $brands = Brand::pluck('name', 'id');
        $title = 'Editar avião: ' . $plane->id;

        return view('panel.planes.edit', compact('title', 'plane', 'classes', 'brands'));
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
        $plane = $this->_plane->find($id);

        if (!$plane) {
            return redirect()->back();
        }

        if ($plane->update($request->all())) {
            return redirect()->route('planes.index')->with('success', 'Sucesso ao editar');
        }

        return redirect()->back()->with('error', 'Falha ao editar');
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
