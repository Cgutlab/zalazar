<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = [
    	'orden', 'file_image', 'tipo'
    ];


	public function subfamilia()
	{
		return $this->belongsTo('App\Subfamilia');
	}
}
