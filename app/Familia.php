<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{    
    protected $fillable = [
    	'nombre', 'orden', 'file_image'
    ];

    public function productos()
    {
    	return $this->hasMany('App\Producto');
    }

    public function subfamilias()
    {
    	return $this->hasMany('App\Subfamilia');
    }

    public function clientes_descuentos()
    {
        return $this->belongsToMany('App\User')->withPivot('id', 'user_id', 'familia_id', 'monto');
    }
}
