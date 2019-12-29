<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Clasificacion;
use App\Extensions\Helpers;

class NovedadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$novedades = Novedad::orderBy('orden')->get();

    	return view('adm.novedades.index', compact('novedades'));
    }

    public function create(){
		$categorias = Clasificacion::orderBy('orden')->get();
    	return view('adm.novedades.create', compact('categorias'));
    }

    public function store(Request $request){
		$novedad = new Novedad;
		
		$datos   = $request->all();
		
		$file_save = Helpers::saveImage($request->file('file_image'), 'novedades');
		$file_save ? $datos['file_image'] = $file_save : false;
        
        $novedad->clasificacion_id = $request->clasificacion_id;

        $novedad->fill($datos);

        if($novedad->save())
            return redirect('adm/novedades/index')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function edit($id){
		$novedad    = Novedad::find($id);
		$categorias = Clasificacion::orderBy('orden')->get();
    	return view('adm.novedades.edit', compact('novedad', 'categorias'));
    }

    public function update(Request $request, $id){
		$novedad   = Novedad::find($id);
		$datos     = $request->all();
		
		$file_save = Helpers::saveImage($request->file('file_image'), 'novedades');
		$file_save ? $datos['file_image'] = $file_save : false;
        
        $novedad->clasificacion_id = $request->clasificacion_id;

        $novedad->fill($datos);

        if($novedad->save())
            return redirect('adm/novedades/index')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $novedad = Novedad::find($id);

        if($novedad->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

}
