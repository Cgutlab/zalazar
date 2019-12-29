<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
    	'titulo', 'descripcion', 'file_image', 'seccion', 'orden'
    ];
}
