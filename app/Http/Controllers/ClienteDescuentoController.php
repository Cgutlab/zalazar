<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subfamilia;
use App\Familia;

class ClienteDescuentoController extends Controller
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

    public function index($id){
        $user         = User::find($id);
        $descuento_sf = $user->descuentos_subfamilias()->get();
        $descuento_f  = $user->descuentos_familias()->get();
        
        $descuentos   = $descuento_sf->concat($descuento_f);
        return view('adm.usuarios.descuentos.index', compact('descuentos', 'user'));
    }

    public function create($id){
        $user        = User::find($id);
        $subfamilias = Subfamilia::orderBy('orden')->get();
        $familias    = Familia::orderBy('orden')->get();
        
        return view('adm.usuarios.descuentos.create', compact('user', 'familias', 'subfamilias'));
    }


    public function store(Request $request){
        $user        = User::find($request->user_id);

        if($request->subfamilia_id != '' && $request->subfamilia_id != 1){
            $subfamilia = Subfamilia::find($request->subfamilia_id);
            $monto = $request->monto_sf;
            if($user->descuentos_subfamilias->contains($subfamilia) == false) 
                $user->descuentos_subfamilias()->save($subfamilia, ['monto' => $monto]);
        }       

        if($request->familia_id != '' && $request->familia_id != 1){
            $familia = Familia::find($request->familia_id);
            $monto = $request->monto_f;
            if($user->descuentos_familias->contains($familia) == false)            
                $user->descuentos_familias()->save($familia, ['monto' => $monto]);
        }

        return \Redirect::route('descuentos.index', $user->id);
    }


    public function edit($tipo, $id){
        
        if($tipo == 'subfamilia'){
            $descuento = \DB::table('subfamilia_user')->where('id', $id)->first();
            $nombre    = Subfamilia::find($descuento->subfamilia_id)->nombre;
        }else{
            $descuento = \DB::table('familia_user')->where('id', $id)->first();
            $nombre    = Familia::find($descuento->familia_id)->nombre;
        }
        $user = User::find($descuento->user_id);

		return view('adm.usuarios.descuentos.edit', compact('descuento', 'user', 'tipo', 'nombre'));
    }

    public function update(Request $request, $tipo, $id){
        if($tipo == 'subfamilia')
            $descuento = \DB::table('subfamilia_user')->where('id', $id)->update(['monto' => $request->monto]);
        else
            $descuento = \DB::table('familia_user')->where('id', $id)->update(['monto' => $request->monto]);
        
        
        $user = User::find($request->user_id);

        return \Redirect::route('descuentos.index', $user->id);
    }



    public function eliminar($tipo, $id, $user){
        $user = User::find($id);

        if($tipo == 'subfamilia')    
            $descuento = \DB::table('subfamilia_user')->where('id', $id)->delete();
        else
            $descuento = \DB::table('familia_user')->where('id', $id)->delete();
               

        return \Redirect::back();
        
    }

}
