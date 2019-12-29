<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informacion;
use App\Extensions\Helpers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return redirect('adm/home');
    }

    public function indexInformacion(){
        $informacion = Informacion::first();
        return view('adm.home.informacion.index', compact('informacion'));
    }

    public function editInformacion($id){
        $informacion = Informacion::find($id);
        return view('adm.home.informacion.edit', compact('informacion'));
    }

    public function updateInformacion(Request $request, $id){
        $informacion = Informacion::find($id);
        $datos       = $request->all();
        
        $file_save   = Helpers::saveImage($request->file('file_image'), 'home');
        $file_save ? $datos['file_image'] = $file_save : false;
        
        $informacion->fill($datos);

        if($informacion->save())
            return redirect('adm/home/informacion/ver')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

}
