<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeccionContactoRequest;
use Mail;
use App\Producto;
use App\Dato;

class SeccionContactoController extends Controller
{
    public function index(){
		$mensaje        = '';
		$seccion        = 'Contacto';
		$mensaje_previo = '¡Contáctanos!';
		$mapa           = Dato::where('tipo', 'mapa')->first();
    	return view('page.contacto.index', compact('mensaje', 'seccion', 'mensaje_previo', 'informacion', 'mapa'));
    }

    public function store(SeccionContactoRequest $request)
    {
        $data = array(['nombre'   => $request->get('nombre'),
                                            'apellido' => $request->get('apellido'),
                                            'empresa'  => $request->get('empresa'),
                                            'email'    => $request->get('email'),
                                            'mensaje'  => $request->get('mensaje')]);
        Mail::send('page.contacto.email.contacto', $data[0], function($message){
                $dato = Dato::where('tipo', 'email')->first();
	    		$message->subject('Te han enviado un mensaje desde la web');
	    		$message->to($dato->descripcion);
	    	}
	    );

    	return redirect()->back()->with('alert', '¡Gracias por contactarnos!');
    }

    public function show($id)
    {
        $producto       =  Producto::find($id);
        $mensaje        = 'Me intera el producto '.$producto->descripcion.'. Por favor contáctenme.';
        $seccion        = 'Contacto';
        $mensaje_previo = '¡Contáctanos!';
        return view('page.contacto.index', compact('mensaje', 'seccion', 'mensaje_previo'));
    }

    public function registro(Request $request){
        $data = array(['nombre'   => $request->get('name'),
                        'email'  => $request->get('email')]);
        Mail::send('page.contacto.email.registro', $data[0], function($message){
                $dato = Dato::where('tipo', 'email')->first();
                $message->subject('Has recibido una solicitud de registro');
                $message->to($dato->descripcion);
            }
        );

        return redirect()->back()->with('alert', '¡Nuestros administradores procesarán tu registro!');
    }
}
