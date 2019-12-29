<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = [
    	'orden', 'file_image', 'tipo'
    ];
    
	public function novedad()
	{
		return $this->belongsTo('App\Novedad');
	}
}
