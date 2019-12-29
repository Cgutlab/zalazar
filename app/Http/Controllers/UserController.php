<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Descuento;

class UserController extends Controller
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
    public function index($tipo)
    {
        $usuarios = User::where('tipo', $tipo)->where('name', '<>', 'Ninguno')->get();

        return view('adm.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create($tipo)
    {
        $tipos = ['vendedor' => 'Vendedor', 'cliente' => 'Cliente'];

        if($tipo == 'cliente'){
            $vendedores = User::where('tipo', 'vendedor')->get();
            $descuentos = Descuento::all();
        }
        
        return view('adm.usuarios.create' , compact('tipo', 'tipos', 'vendedores', 'descuentos'));
    }

    public function store(Request $request)
    {

        $user = new User ($request->all());
        $user->password = bcrypt($request->password);
        
        $user->tipo         = $request->tipo;
        $user->parent_id    = $request->parent_id;
        $user->descuento_id = $request->descuento_id;
        $user->username     = $request->email;

        if($user->save())
             return redirect()->back()->with('alert', "Usuario registrado exitósamente" );
        else
             return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }

    public function edit($tipo, $id){
        $user = User::find($id);
        $tipo = ['vendedor' => 'Vendedor', 'cliente' => 'Cliente'];

        if($user->tipo == 'cliente'){
            $vendedores = User::where('tipo', 'vendedor')->get();
            $descuentos = Descuento::all();
        }
        
        return view('adm.usuarios.edit', compact('user', 'tipo', 'vendedores', 'descuentos'));
    }

    public function update(Request $request, $tipo, $id){
        $user  = User::find($id);
        $user->fill($request->all());

        $user->tipo         = $request->tipo;
        $user->parent_id    = $request->parent_id;
        $user->descuento_id = $request->descuento_id;
        $user->username     = $request->email;
        $user->password     = bcrypt($request->password);

        if($user->save())
            return redirect()->back()->with('alert', "Usuario actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($tipo, $id){
        $user = User::find($id);

        if($user->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

}
