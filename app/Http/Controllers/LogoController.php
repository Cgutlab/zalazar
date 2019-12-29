<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Redirect;


class LogoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();

        return view('adm.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo      = Logo::find($id);
        $secciones = ['navbar' => 'Barra Principal', 'footer' => 'Pie de Página', 'favicon' => 'Favicon'];

        return view('adm.logos.edit', compact('secciones', 'logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logo      = Logo::find($id);
        $datos     = $request->all();
        $file_save = Helpers::saveImage($request->file('file_image'), 'logos');
        $file_save ? $datos['file_image'] = $file_save : false;       
        $logo->fill($datos);

        if($logo->save())
            return redirect('adm/logos')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
