<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;
use Illuminate\Support\Facades\Storage;

class PrecioController extends Controller
{ public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
    	$descargas = Precio::orderBy('orden')->get();

    	return view('adm.listado.descargas.index', compact('descargas'));
    }
  

    public function create(){
    	return view('adm.listado.descargas.create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
	{
		$datos    = $request->all();

        $descarga = new Precio;

        $descarga->fill($datos);

        $descarga->save();

        if($request->file('file')!=null){
            
            $ruta           = 'listado';
            $path           = \Storage::putFileAs($ruta, $request->file('file'),$descarga->id.'-'.$request->file('file')->getClientOriginalName());
            $rutaNombre     = $descarga->id.'-'.$request->file('file')->getClientOriginalName();
            $descarga->file = $rutaNombre;

        }

        if($descarga->save())
            return redirect('adm/listado/descargas')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }


    public function edit($id){
    	$descarga = Precio::find($id);

    	return view('adm.listado.descargas.edit', compact('descarga'));
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
		$descarga = Descarga::find($id);
		$datos    = $request->all();
        $descarga->fill($datos);

        if($request->file('file')!=null){
            
            $ruta           = 'listado';
            $path           = \Storage::putFileAs($ruta, $request->file('file'),$descarga->id.'-'.$request->file('file')->getClientOriginalName());
            $rutaNombre     = $descarga->id.'-'.$request->file('file')->getClientOriginalName();
            $descarga->file = $rutaNombre;

        }

        if($descarga->save())
            return redirect('adm/listado/descargas')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $descarga = Precio::find($id);

        if($descarga->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
