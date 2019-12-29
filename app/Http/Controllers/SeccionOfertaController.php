<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class SeccionOfertaController extends Controller
{
	public function index()
	{	
		$productos = Producto::where('oferta', '>', '0')->get();

	    return view('page.privada.ofertas.index', compact('productos'));
	}
}
