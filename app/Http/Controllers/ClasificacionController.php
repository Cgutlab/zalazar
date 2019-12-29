<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;

class ClasificacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$categorias = Clasificacion::orderBy('orden')->get();
    	return view('adm.novedades.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.novedades.categorias.create');
    }

    public function store(Request $request)
    {
        $categoria           = new Clasificacion ($request->all());

        if($categoria->save())
             return redirect('adm/novedades/categorias')->with('alert', "Registro almacenado exitósamente" );
        else
             return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Clasificacion::find($id);
        return view('adm.novedades.categorias.edit', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$categoria = Clasificacion::find($id);
		$datos     = $request->all();
        $categoria->fill($datos);

        if($categoria->save())
            return redirect('adm/novedades/categorias')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $categoria = Clasificacion::find($id);

        if($categoria->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }


}
