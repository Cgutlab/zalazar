<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Extensions\Helpers;
use Redirect;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index($seccion)
    {
        $sliders = Slider::where('seccion', $seccion)->orderBy('orden', 'asc')->get();

        return view('adm.sliders.index', compact('sliders', 'seccion'));
    }

    public function create($seccion)
    {
        return view('adm.sliders.create', compact('seccion'));
    }

    public function store(Request $request, $seccion)
    {
        $slider    = new Slider;
        $datos     = $request->all();

        $file_save = Helpers::saveImage($request->file('file_image'), 'sliders');
        $file_save ? $datos['file_image'] = $file_save : false;       
        
        $slider->fill($datos);
        dd($seccion);
        $slider->seccion = $seccion;


        if($slider->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenado el registro" );
    }


    public function edit($seccion, $id)
    {
        $slider = Slider::find($id);

        return view('adm.sliders.edit', compact('seccion', 'slider'));
    }

    public function update(Request $request, $seccion, $id)
    {

        $slider    = Slider::find($id);
        $datos     = $request->all();
        $file_save = Helpers::saveImage($request->file('file_image'), 'sliders');
        $file_save ? $datos['file_image'] = $file_save : false;       
        
        $slider->fill($datos);

        if($slider->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $slider = Slider::find($id);

        if($slider->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
