<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.dashboard');
    }

    public function listar()
    {
        $usuarios = Admin::paginate(7);
        return view('adm.admins.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $tipo = ['admin' => 'Administrador', 'usuario' => 'Usuario'];
        return view('adm.admins.create' , compact('tipo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
          'name'     => 'required',
          'username' => 'required',
          'password' => 'required'
          ]);
        // store in the database
        $admins           = new Admin;
        $admins->name     = $request->name;
        $admins->username    = $request->username;
        $admins->password = bcrypt($request->password);
        $admins->save();
        return redirect()->route('admin.auth.login');
    }

    public function edit($id){
        $user         = Admin::find($id);
        $tipo = ['admin' => 'Administrador', 'usuario' => 'Usuario'];
        return view('adm.admins.edit', ['user' => $user, 'tipo' => $tipo]);
    }

    public function update(Request $request, $id){
        $user = Admin::find($id);
        $user->fill($request->all());
        $user->password= bcrypt($request->password);

        if($user->save())
            return redirect('adm/admin/listar')->with('alert', "Usuario actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $user = Admin::find($id);

        if($user->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
