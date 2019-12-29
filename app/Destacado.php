<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    //
    public function subfamilia()
    {
        return $this->belongsTo('App\Subfamilia');
    } 
}
