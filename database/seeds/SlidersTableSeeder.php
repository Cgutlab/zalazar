<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('sliders')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'file_image' => 'sliders__slider1.jpg',
				'seccion'    => 'home',
				'titulo'     => 'CALIDAD Y SERVICIO',
				'descripcion'=> 'Accesorios y repuestos de Sanitarios',
				'orden'      => 'aa',
			),
			1 => 
			array (
				'id'         => 2,
				'file_image' => 'sliders__slider2.jpg',
				'seccion'    => 'empresa',
				'titulo'     => 'AMPLIA TRAYECTORIA EN EL RUBRO',
				'descripcion'=> 'Somos Especialistas' ,
				'orden'      => 'aa',
			),
		));    
    }
}
