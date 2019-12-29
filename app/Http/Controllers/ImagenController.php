<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Imagen;
use App\Extensions\Helpers;
use Redirect;

class ImagenController extends Controller
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

	public function index($id)
    {
        $novedad = Novedad::where('id', $id)->with('galerias')->first();
        return view('adm.novedades.galeria.show', ['novedad' => $novedad]);
    }


	public function create($id)
    {
        $novedad = Novedad::find($id);
        return view('adm.novedades.galeria.create', ['novedad' => $novedad]);
    }

    public function store(Request $request)
    {
		$novedad_id = $request->novedad_id;
		$datos      = $request->all();
		$status     = 0;

        foreach($request->file('file_image') as $img){
            $file_save = Helpers::saveImage($img, 'galeria_novedades');
            $file_save ? $datos['file_image'] = $file_save : false;

			$galeria             = new Imagen;
			$galeria->novedad_id = $novedad_id;
			$galeria->file_image = $file_save;
			$galeria->orden      = $request->orden;

            if($galeria->save())
                $status = 1;
            else
                return redirect('adm/novedades/index')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
        }
        
        if($status==1)
            return redirect('adm/novedades/index')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect('adm/novedades/index')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
		$galeria = Imagen::find($id);
		$novedad = Novedad::find($galeria->novedad_id);

        return view('adm.novedades.galeria.edit', compact('galeria', 'novedad'));
    }

    public function update(Request $request, $id)
    {
        $galeria   = Imagen::find($id);
        
        $datos     = $request->all();
        $file_save = Helpers::saveImage($request->file('file_image'), 'galeria_novedades');
        $file_save ? $datos['file_image'] = $file_save : false;  

        $galeria->fill($datos);

        if($galeria->save())
            return  redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id)
    {
		$galeria = Imagen::find($id);
		$novedad = Novedad::find($galeria->novedad->id);
		$path    = $galeria->file_image;

        \File::exists(public_path('images/galeria_novedades/'.$galeria->file_image));

        if($galeria->delete()){
            \File::delete(public_path('images/galeria_novedades/'.$path));
            $galeria = Imagen::where('novedad_id', $novedad->id)->get();
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        }else{
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
        }
    }

}
