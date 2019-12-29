<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
    	'monto', 'tipo',
    ];

    public function clientes()
    {
        return $this->hasMany('App\User');
    }
}
