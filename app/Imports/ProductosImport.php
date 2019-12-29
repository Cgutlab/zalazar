<?php

namespace App\Imports;

use App\Producto;
use App\Familia;
use App\Subfamilia;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /*Validar que sea el final del archivo*/

        if($row[0] != null || $row[1] != null || $row[2] != null ||  $row[3] != null ||  $row[4] != null ||  $row[5] != null ){
            $codigo       = trim($row[0]);
            $familia      = trim($row[1]);
            $subfamilia   = trim($row[2]);
            $descripcion  = trim($row[3]);
            $presentacion = trim($row[4]);
            $precio       = trim($row[5]);

            if($familia != "Familia" && $subfamilia != "Subfamilia" && $codigo != "Código" && $descripcion != 'Denominación' && $presentacion != 'Presentación' && $precio != 'Precio'){

                $producto = Producto::where('codigo', $codigo)->first();

                $f  = Familia::where('nombre', 'like', $familia)->first();

                if($subfamilia != ""){
                    $sf = Subfamilia::where('nombre', 'like', $subfamilia)->first();
                    if($f == null ){
                        $familia_new         = new Familia; 
                        $familia_new->nombre = $familia;
                        $familia_new->save();

                        if($sf == null ){
                            $subfamilia_new             = new Subfamilia; 
                            $subfamilia_new->nombre     = $subfamilia;
                            $subfamilia_new->familia_id = $familia_new->id;
                            $subfamilia_new->save();
                        }
                    }else{                
                        if($sf == null ){
                            $subfamilia_new             = new Subfamilia; 
                            $subfamilia_new->nombre     = $subfamilia;
                            $subfamilia_new->familia_id = $f->id;
                            $subfamilia_new->save();
                        }
                    }
                }else{
                    $subfamilia = 'Ninguna';

                    if($f == null ){
                        $familia_new         = new Familia; 
                        $familia_new->nombre = $familia;
                        $familia_new->save();
                    }

                }

                if(!$producto){
                    $f = Familia::where('nombre', 'like', $familia)->first();
                    $s = Subfamilia::where('nombre', 'like', $subfamilia)->first();

                    $familia_id    = ($f != null)?$f->id:1;
                    $subfamilia_id = ($s != null)?$s->id:1;

                    return new Producto([
                        'codigo'        => $codigo,
                        'descripcion'   => $descripcion,
                        'presentacion'  => $presentacion,
                        'precio'        => $precio,
                        'familia_id'    => $familia_id,
                        'subfamilia_id' => $subfamilia_id,
                        'file_image'    => $codigo,
                    ]);
                }else{

                    $familia    = Familia::where('nombre', $row[1])->first();
                    $subfamilia = Subfamilia::where('nombre', $row[2])->first();


                    $familia_id    = ($familia != null)?$familia->id:1;
                    $subfamilia_id = ($subfamilia != null)?$subfamilia->id:1;


                    $producto->codigo        = $codigo;
                    $producto->precio        = $precio;

                    return $producto;

                }
            }
        }
    }
}


