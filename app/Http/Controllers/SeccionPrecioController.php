<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;

class SeccionPrecioController extends Controller
{
    public function index()
    {
		$descargas = Precio::orderBy('orden')->get();
    	return view('page.listado.index', compact('descargas'));
    }
}
