<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Familia;
use App\Subfamilia;
use App\Galeria;
use App\Extensions\Helpers;
use App\Imports\ProductosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $productos = Producto::orderBy('familia_id')->orderBy('subfamilia_id')->orderBy('orden')->get();
        return view('adm.productos.index', compact('productos'));
    }

    public function create()
    {
		$familias    = Familia::where('id', '>', '1')->orderBy('orden')->get();
		$subfamilias = Subfamilia::where('id', '<',  '1')->get();
        return view('adm.productos.create', compact('familias', 'subfamilias'));
    }

    public function store(Request $request)
    {
		$datos     = $request->all();
		$producto  = new Producto;
		$file_save = Helpers::saveImage($request->file('file_image'), 'productos');
        $file_save ? $datos['file_image'] = $file_save : false;   
    
        $producto->fill($datos);

		$producto->familia_id    = $request->familia_id;
		$producto->subfamilia_id = $request->subfamilia_id;

        if($producto->save())
            return redirect('adm/productos/index')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect('adm/productos/index')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
		$producto    = Producto::find($id);
		$familias    = Familia::where('id', '>', '1')->orderBy('orden')->get();
		$subfamilias = Subfamilia::where('id', '>', '1')->orderBy('orden')->get();
    	return view('adm.productos.edit', compact('familias', 'subfamilias', 'producto'));
    }

    public function update(Request $request, $id)
    {
		$datos     = $request->all();
		$producto  = Producto::find($id);
		$file_save = Helpers::saveImage($request->file('file_image'), 'productos');
        $file_save ? $datos['file_image'] = $file_save : false;       
        $producto->fill($datos);

        $producto->familia_id = $request->familia_id;
        $producto->subfamilia_id = $request->subfamilia_id;

        if($producto->save())
            return redirect('adm/productos/index')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/productos/index')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $producto = Producto::find($id);

        if($producto->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

    public function subfamilias(){
		$input       = Input::get('option');

		$familias    = Familia::find($input);
		$subfamilias = $familias->subfamilias();
	    return response()->json($subfamilias->get(['id', 'nombre']));
    }

    public function carga(){
        return view('adm.productos.carga');
    }

    public function archivo(Request $request){

        if($request->file('file')!=null){

            Excel::import(new ProductosImport, $request->file('file'));
        }
        
        return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
    }

}
