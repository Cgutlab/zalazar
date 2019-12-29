<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;
use App\Catalogo;

class SeccionCatalogoController extends Controller
{
    public function index()
    {
		//$descargas = Descarga::orderBy('orden')->get();
		$catalogo = Catalogo::first();
    	return view('page.catalogo.index', compact('catalogo'));
    }
}
