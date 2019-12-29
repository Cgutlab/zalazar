<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Metadato;
use App\Producto;
use App\Subfamilia;
use App\Descuento;
use App\Pedido;
use App\User;
use App\Dato;
use Darryldecode\Cart\Facades\CartFacade;
use Session;
use Mail;

class SeccionPrivadaController extends Controller
{
    public function index(){
        $user = \Auth::user();

        return view('page.privada.index', compact('user'));
    }

    public function cliente(Request $request, $id){
        $request->session()->put('cliente_id', $id);
        $userId = $request->session()->get('cliente_id');


        \Cart::session($userId);

        $familias   = Familia::where('id', '>', '1')->orderBy('nombre')->orderBy('orden')->get();
        $seccion    = 'Productos';
        $metadato   = Metadato::where('seccion', $seccion)->first();
        $has_cliente  = Session::has('cliente_id');

        return view('page.productos.index', compact('has_cliente', 'familias', 'seccion', 'metadato'));
    }

    public function store(Request $request){

        $producto               = Producto::find($request->id);
        $tipo                   = \Auth::user()->tipo;
        $producto_familia_id    = $producto->familia_id;
        $producto_subfamilia_id = $producto->subfamilia_id;
        if($tipo == 'vendedor'){
            if(Session::has('cliente_id')){
                $userId        = Session::get('cliente_id');
                $cliente       = User::find($userId);

                $descuentos_f  = $cliente->descuentos_familias;
                $descuentos_sf = $cliente->descuentos_subfamilias;
            }
        }else{
            $userId        = \Auth::user()->id;
            $descuentos_f  = \Auth::user()->descuentos_familias;
            $descuentos_sf = \Auth::user()->descuentos_subfamilias;
        }

        $desc_familia = $descuentos_f->filter(function($desc_familia) use ($producto_familia_id)
        {
            if($desc_familia->pivot->familia_id == $producto_familia_id){
                $desc_familia = $desc_familia->pivot->familia_id;
                return $desc_familia;
            }
        });

        $desc_familia = $desc_familia->first();
        
        $desc_subfamilia = $descuentos_sf->filter(function($desc_subfamilia) use ($producto_subfamilia_id)
        {
            if($desc_subfamilia->pivot->subfamilia_id == $producto_subfamilia_id){
                $desc_subfamilia = $desc_subfamilia->pivot->subfamilia_id;
                return $desc_subfamilia;
            }
        });

        $desc_subfamilia = $desc_subfamilia->first();

        \Cart::add(array(
            'id'       => $producto->id,
            'name'     => $producto->descripcion,
            'price'    => $producto->precio,
            'quantity' => $request->cantidad,
            'attributes' => array(
                'image'            => $producto->subfamilia->file_image,
                'codigo'           => $producto->codigo,
                'categoria'        => $producto->subfamilia->nombre,
                'oferta'           => $producto->oferta,
                'subfamilia_monto' => ($desc_subfamilia != null)?$desc_subfamilia->pivot->monto:0,
                'familia_monto'    => ($desc_familia != null)?$desc_familia->pivot->monto:0,
            )
        ));

        if(\Cart::getContent() != null){
            return response()->json(array("text"=>'Done!',"status"=>0));
        }else{
            return response()->json(array("text"=>'Error registrando el articulo',"status"=>1));

        }

    }

    public function remover(Request $request){
        if(\Cart::remove($request->id))
            return response()->json(array("text"=>'Done!',"status"=>0));
        else
            return response()->json(array("text"=>'Error!',"status"=>1));
    }

    public function pedido(){
        $tipo      = \Auth::user()->tipo;
        $descuento = Descuento::where('tipo', $tipo)->first();
        $user      = \Auth::user();

        if($tipo == 'vendedor'){
            if(Session::has('cliente_id')){
                $userId        = Session::get('cliente_id');
                $cliente       = User::find($userId);
                
                $descuentos_f  = $cliente->descuentos_familias;
                $descuentos_sf = $cliente->descuentos_subfamilias;
                $cart          = (\Cart::getContent()->count() > 0)?\Cart::getContent():'';
                
                $descuento     = $cliente->descuento->monto;
            }
            else
            {
                $cart = '';
                Session::flush();
            }
        }else{
            $userId        = \Auth::user()->id;
            $descuentos_f  = \Auth::user()->descuentos_familias;
            $descuentos_sf = \Auth::user()->descuentos_subfamilias;
            $cart          = (\Cart::getContent()->count() > 0)?\Cart::getContent():'';
                
            $descuento     = \Auth::user()->descuento->monto;
        }

        return view('page.privada.pedido.index', compact('user', 'cart', 'descuento', 'cliente', 'descuentos_f', 'descuentos_sf'));
    }

    public function confirmar(Request $request){

        $cart = \Cart::getContent();

        if(\Auth::user()->tipo == 'vendedor'){
            $comprador = User::find(Session::get('cliente_id'));
            $vendedor  = \Auth::user();

        }else{
            $comprador = \Auth::user();
            $vendedor  = User::find('1');
        }
        
        $pedido = Pedido::where('comprador_id', $comprador->id)->where('status', 0)->first();

        if(!$pedido){
            $pedido               = New Pedido;
        }

        $pedido->comprador_id = $comprador->id;
        $pedido->vendedor_id  = $vendedor->id;
        $pedido->monto_total  = $request->monto;
        $pedido->status       = 0;
        $pedido->save();

        foreach ($cart as $c) {
            $producto_id = Producto::find($c->id);
            //$pedido      = $pedido->articulos()->save($producto_id, ['cantidad' => $c->quantity]);
            $pedidos =  \DB::table('pedido_producto')->insert(
                 ['producto_id' => $producto_id->id, 
                 'pedido_id'    => $pedido->id,
                 'cantidad'     => $c->quantity]
            );
        }


        $pedidos = $pedido->articulos;

        $data = array(['cliente'  => $comprador->name,
                       'pedido'   => $pedido->id,
                       'articulos'=> $pedidos,
                       'vendedor' => $vendedor,
                       'monto'    => $pedido->monto_total,
                       'mensaje'  => $request->get('mensaje')]);
            Mail::send('page.privada.pedido.email.pedido', $data[0], function($message){
                $dato = Dato::where('tipo', 'email')->first();
                $message->subject('Has recibido un pedido');
                $message->to($dato->descripcion);
            }
        );


        \Cart::clear();
        $request->session()->forget('cliente_id');

        return response()->json(array("text"=>'Done!',"status"=>0));     

    }

    public function historico(){
        if(\Auth::user()->tipo == 'vendedor'){
            $pedidos = Pedido::where('vendedor_id', \Auth::user()->id)->get();

        }else{
            $pedidos = Pedido::where('comprador_id', \Auth::user()->id)->get();
        }


        return view('page.privada.historico.index', compact('pedidos'));
    }

    public function update(Request $request){

        $cantidad        = $request->cantidad;
        $cart            = \Cart::get($request->id);
        $cantidad_actual = $cart->quantity;

        $diferencia = $cantidad - $cantidad_actual;

        \Cart::update($request->id, array(
            'quantity' => $diferencia, 
        ));

        if($request->cantidad == '0'){
            $this->remover($request);
        }

        return response()->json(array("text"=>'Done!',"status"=>0));     
    }
}
