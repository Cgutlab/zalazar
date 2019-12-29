<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Metadato;
use App\Producto;
use App\Subfamilia;

class SeccionProductoController extends Controller
{
	public function index()
	{	
		$familias    = Familia::where('id', '>', '1')->orderBy('nombre')->orderBy('orden')->get();
		$seccion     = 'Productos';
		$metadato    = Metadato::where('seccion', $seccion)->first();
		$has_cliente = \Session::has('cliente_id');

	    return view('page.productos.index', compact('familias', 'seccion', 'metadato', 'has_cliente'));
	}

	public function show($id)
	{	
		$familias             = Familia::where('id', '>', '1')->orderBy('nombre')->orderBy('orden')->get();
		$seccion              = 'Productos';
		$metadato             = Metadato::where('seccion', $seccion)->first();
		
		$familia              = Familia::find($id);
		$subfamilias          = Subfamilia::orderBy('nombre')->orderBy('orden')->get();
		$subfamilias_familia  = Subfamilia::where('familia_id', $id)->orderBy('nombre')->orderBy('orden', 'asc')->get();	
		$activo               = 0;
		$productos_sf         = Producto::where('subfamilia_id', '1')->orderBy('descripcion')->get();
		$productos_sf_familia = Producto::where('subfamilia_id', '1')->where('familia_id', $id)->orderBy('descripcion')->get();

		

        $cart = (\Cart::getContent());
        $carrito = array();

        foreach ($cart as $c) {
        	$carrito[$c->quantity] = $c->id;        	
        }

	    return view('page.productos.show', compact('cart', 'carrito', 'productos_sf', 'productos_sf_familia', 'familias', 'seccion', 'metadato', 'familia', 'activo', 'subfamilias', 'subfamilias_familia'));
	}

/*	public function showProductos($id)
	{	
		$seccion               = 'Productos';
		$metadato              = Metadato::where('seccion', $seccion)->first();
		
		$familias              = Familia::where('id', '>', '1')->orderBy('orden')->get();
		$subfamilias           = Subfamilia::orderBy('orden')->get();
		$productos             = Producto::orderBy('orden', 'asc')->get();
		
		$subfamilia            = Subfamilia::find($id);
		$familia               = Familia::find($subfamilia->familia_id);
		$subfamilias_productos = Producto::where('familia_id', $familia->id)->where('subfamilia_id', $subfamilia->id)->orderBy('orden', 'asc')->get();	
		$activo                = ($subfamilia->id > '1')?$subfamilia->id:$producto->id;
		$productos_sf 	 	   = Producto::where('subfamilia_id', '1')->get();

	    return view('page.productos.showProductos', compact('productos_sf', 'familias', 'seccion', 'metadato', 'familia', 'productos', 'activo', 'subfamilias','subfamilia', 'subfamilias_productos'));
	}*/

	public function showProducto($id, $tipo)
	{			
		$familias              = Familia::where('id', '>', '1')->orderBy('nombre')->orderBy('orden')->get();
		$subfamilias           = Subfamilia::where('id', '>', '1')->orderBy('nombre')->orderBy('orden')->get();
		$productos             = Producto::orderBy('orden', 'asc')->get();

		if($tipo == 'subfamilia'){
			$subfamilia            = Subfamilia::find($id);
			$familia               = Familia::find($subfamilia->familia_id);
			$subfamilias_productos = Producto::where('familia_id', $familia->id)->where('subfamilia_id', $subfamilia->id)->orderBy('orden', 'asc')->get();	
			$activo                = $subfamilia->id;
			$productos_sf 	 	   = Subfamilia::where('familia_id', $subfamilia->familia_id)->orderBy('nombre')->get();
		}else{
			$familia = Familia::find($id);
			$familia_productos = Producto::where('familia_id', $familia->id)->orderBy('orden')->get();
			$activo = $familia->id;
		}

        $cart = (\Cart::getContent());
        $carrito = array();

        foreach ($cart as $c) {
        	$carrito[$c->quantity] = $c->id;        	
        }
	    return view('page.productos.showProducto', compact('tipo', 'cart', 'carrito', 'productos_sf', 'familias', 'seccion', 'metadato', 'familia', 'productos', 'activo', 'subfamilias','subfamilia', 'subfamilias_productos', 'producto'));
	}

}

