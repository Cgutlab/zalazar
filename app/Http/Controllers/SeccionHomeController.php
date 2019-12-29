<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Producto;
use App\Informacion;
use App\Destacado;

class SeccionHomeController extends Controller
{
    public function index()
    {
        $sliders     = Slider::where('seccion', 'home')->get();
        $destacados  = Destacado::orderBy('orden')->get();
        $informacion = Informacion::first();
    	return view('page.home.index', compact('sliders', 'destacados', 'informacion'));
    }

    public function buscador(Request $request)
    {
        $busqueda    = $request->nombre;
        $resultado   = Producto::where('descripcion', 'like', '%'.$busqueda.'%')->orWhere('codigo', 'like', '%'.$busqueda.'%')->orderBy('descripcion')->get();
        // $familias    = Familia::where('nombre', 'like', '%'.$busqueda.'%')->orderBy('nombre')->get();
        // $subfamilias = Subfamilia::where('nombre', 'like', '%'.$busqueda.'%')->orderBy('nombre')->get();


        return view('page.home.busqueda', ['resultado' => $resultado]);
    }

    public function busqueda(){
        return view('page.home.buscador');
    }
}
