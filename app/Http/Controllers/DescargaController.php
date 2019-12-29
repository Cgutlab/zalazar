<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;
use Illuminate\Support\Facades\Storage;

class DescargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
    	$descargas = Descarga::orderBy('orden')->get();

    	return view('adm.catalogo.descargas.index', compact('descargas'));
    }
  

    public function create(){
    	return view('adm.catalogo.descargas.create');
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

        $descarga = new Descarga;

        $descarga->fill($datos);

        $descarga->save();

        if($request->file('file')!=null){
            
			$ruta           = 'descargas';
			$path           = Storage::putFileAs($ruta, $request->file('file'),'catalogo'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension());
			$rutaNombre     = 'catalogo'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension();
			$descarga->file = $rutaNombre;

        }

        if($descarga->save())
            return redirect('adm/catalogo/descargas')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }


    public function edit($id){
    	$descarga = Descarga::find($id);

    	return view('adm.catalogo.descargas.edit', compact('descarga'));
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
            
            $ruta           = 'descargas';
            $path           = Storage::putFileAs($ruta, $request->file('file'),'catalogo'.$id.'.'.$request->file('file')->getClientOriginalExtension());
            $rutaNombre     = 'catalogo'.$id.'.'.$request->file('file')->getClientOriginalExtension();
            $descarga->file = $rutaNombre;

        }

        if($descarga->save())
            return redirect('adm/catalogo/descargas')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $descarga = Descarga::find($id);

        if($descarga->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }


}
