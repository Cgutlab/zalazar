<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Clasificacion;

class SeccionNovedadesController extends Controller
{
	public function index()
	{	
		$novedades        = Novedad::orderBy('clasificacion_id')->orderBy('orden')->get();
		$categorias       = Clasificacion::orderBy('orden')->get();

	    return view('page.novedades.index', compact('novedades', 'categorias'));
	}

	public function filter($id)
	{
		$novedades        = Novedad::where('clasificacion_id', $id)->orderBy('clasificacion_id')->orderBy('orden')->get();
		$categorias       = Clasificacion::orderBy('orden')->get();
		$categoria_activa = Clasificacion::find($id);

	    return view('page.novedades.filter', compact('novedades', 'categorias', 'categoria_activa'));
	}

	public function ver($id)
	{
		$novedad    = Novedad::find($id);
		$categorias = Clasificacion::orderBy('orden')->get();

	    return view('page.novedades.show', compact('novedad', 'categorias', 'categoria_activa'));

	}
}
