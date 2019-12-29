<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogo;


class CatalogoController extends Controller
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

    public function index(){
    	$catalogo = Catalogo::first();

    	return view('adm.catalogo.index', compact('catalogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogo = Catalogo::first();
        return view('adm.catalogo.edit', compact('catalogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catalogo = Catalogo::find($id);
        $datos    = $request->all();
        $catalogo->fill($datos);

        if($catalogo->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

}
