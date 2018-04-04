<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{

    private $_user;
    private $_totalPage = 5;

    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Usuários';

        $users = $this->_user->paginate($this->_totalPage);

        return view('panel.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo usuário';

        return view('panel.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        if ($this->_user->newUser($request)) {
            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso');
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
        $user = $this->_user->find($id);

        if (!$user) {
            return redirect()->back();
        }

        $title = 'Detalhes do usuário: ' . $user->name;

        return view('panel.users.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->_user->find($id);

        if (!$user) {
            return redirect()->back();
        }

        $title = 'Editar usuário: ' . $user->name;

        return view('panel.users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = $this->_user->find($id);

        if (!$user) {
            return redirect()->back();
        }

        if ($user->updateUser($request)) {
            return redirect()->route('users.index')->with('success', 'Usuário alterado com sucesso');
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
        $user = $this->_user->find($id);

        if (!$user) {
            return redirect()->back();
        }

        if ($user->delete()) {
            return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso');
        }

        return redirect()->back()->with('error', 'Falha ao excluir');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');
        $users = $this->_user->search($request->key_search, $this->_totalPage);
        $title = 'Usuários, filtro para: ' . $request->key_search;

        return view('panel.users.index', compact('title', 'users', 'dataForm'));
    }

}
