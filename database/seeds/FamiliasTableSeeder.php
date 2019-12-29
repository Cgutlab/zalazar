<?php

use Illuminate\Database\Seeder;

class FamiliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('familias')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'nombre'     => 'Ninguna',
				'orden'      => 'aa',
				'file_image' => null
			),
			1 => 
			array (
				'id'         => 2,
				'nombre'     => 'Repuestos Sanitarios',
				'orden'      => 'aa',
				'file_image' => 'familias__familia1.jpg'
			),
			2 => 
			array (
				'id'         => 3,
				'nombre'     => 'Repuestos de Gas',
				'orden'      => 'bb',
				'file_image' => 'familias__familia2.jpg'
			),
			3 => 
			array (
				'id'         => 4,
				'nombre'     => 'Accesorios Trafilados para Gas',
				'orden'      => 'cc',
				'file_image' => 'familias__familia3.jpg'
			),
			4 => 
			array (
				'id'         => 5,
				'nombre'     => 'Accesorios de Bronce Roscado',
				'orden'      => 'dd',
				'file_image' => 'familias__familia4.jpg'
			),
			5 => 
			array (
				'id'         => 6,
				'nombre'     => 'Accesorios Termofusión',
				'orden'      => 'ee',
				'file_image' => 'familias__familia5.jpg'
			),
			6 => 
			array (
				'id'         => 7,
				'nombre'     => 'Accesorios de Polipropileno',
				'orden'      => 'ff',
				'file_image' => 'familias__familia6.jpg'
			),
			7 => 
			array (
				'id'         => 8,
				'nombre'     => 'Accesorios Sigas',
				'orden'      => 'gg',
				'file_image' => 'familias__familia7.jpg'
			),
			8 => 
			array (
				'id'         => 9,
				'nombre'     => 'Accesorios de Zinc',
				'orden'      => 'hh',
				'file_image' => 'familias__familia8.jpg'
			),
			9 => 
			array (
				'id'         => 10,
				'nombre'     => 'Repuestos para ferretería',
				'orden'      => 'ii',
				'file_image' => 'familias__familia9.jpg'
			),
		));
    }
}
