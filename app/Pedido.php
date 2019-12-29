<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
    	'monto_total', 'status'
    ];

	public function articulos()
	{
	    return $this->belongsToMany('App\Producto')->withPivot('id', 'pedido_id', 'producto_id', 'cantidad');
	}

    public function vendedor()
    {
    	return $this->belongsTo('App\User');
    }  

    public function comprador()
    {
    	return $this->belongsTo('App\User');
    }   

}
