<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $fillable = [
        'titulo', 'texto', 'file_image', 'orden'
    ];

    public function clasificacion()
    {
    	return $this->belongsTo('App\Clasificacion');
    }   
    
    public function galerias()
    {
        return $this->hasMany('App\Imagen');
    }
}
