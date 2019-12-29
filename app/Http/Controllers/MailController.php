<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function enviarMail(Request $request){

        $data = array(['nombre'   => $request->get('nombre'),
                                            'apellido' => $request->get('apellido'),
                                            'empresa'  => $request->get('empresa'),
                                            'email'    => $request->get('email'),
                                            'mensaje'  => $request->get('mensaje')]);
        Mail::send('page.contacto.email.contacto', $data[0], function($message){
                $dato = Dato::where('tipo', 'email')->first();
	    		$message->subject('Has recibido un pedido');
	    		$message->to($dato->descripcion);
	    	}
	    );
    }
}
