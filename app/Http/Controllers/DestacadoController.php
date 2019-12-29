<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destacado;
use App\Subfamilia;

class DestacadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$destacados = Destacado::orderBy('orden')->get();
    	return view('adm.home.destacados.index', compact('destacados'));
    }

    public function edit($id)
    {
        $destacado  = Destacado::find($id);
		$destacados = Subfamilia::orderBy('orden')->get();


    	return view('adm.home.destacados.edit', compact('destacado', 'destacados'));
    }

    public function update(Request $request, $id)
    {
		$destacado                = Destacado::find($id);
		$destacado->subfamilia_id = $request->subfamilia_id;
		$destacado->orden         = $request->orden;

    	if($destacado->save())
            return redirect('adm/home/destacados')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
