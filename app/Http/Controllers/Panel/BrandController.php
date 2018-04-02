<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\BrandStoreUpdateFormRequest;

class BrandController extends Controller
{

    private $_brand;
    private $_totalPage = 3;

    public function __construct(Brand $brand)
    {
        $this->_brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Marcas de aviões';

        $brands = $this->_brand->paginate($this->_totalPage);

        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar marcas de avião';

        return view('panel.brands.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        if ($this->_brand->create($dataForm)) {
            return redirect()->route('brands.index')->with('success', 'Cadastro realizado com sucesso');
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
        $brand = $this->_brand->find($id);

        if (!$brand) {
            return redirect()->back();
        }

        $title = "Detalhes da marca: $brand->name";

        return view('panel.brands.show', compact('title', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->_brand->find($id);

        if (!$brand) {
            return redirect()->back();
        }

        $title = "Editar marca: $brand->name";

        return view('panel.brands.create-edit', compact('title', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdateFormRequest $request, $id)
    {
        $brand = $this->_brand->find($id);

        if (!$brand) {
            return redirect()->back();
        }

        $update = $brand->update($request->all());

        if ($update) {
            return redirect()->route('brands.index')->with('success', 'Atualizado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->_brand->find($id);

        if (!$brand) {
            return redirect()->back();
        }

        if ($brand->delete()) {
            return redirect()->route('brands.index')->with('success', 'Deletado com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao deletar');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $brands = $this->_brand->search($request->key_search, $this->_totalPage);

        $title = 'Marcas, filtros para ' . $request->key_search;

        return view('panel.brands.index', compact('title', 'brands', 'dataForm'));
    }

}
