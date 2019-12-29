<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('productos')->insert(array (
			0 =>
			array (
				'id'            => 1,
				'codigo'        => '504.100',
				'descripcion'   => 'CODO B/ROSCADO H-H 1/2',
				'orden'         => 'aa',
				'presentacion'  => '100',
				'precio'        => '250',
				'oferta'		=> '50',
				'file_image'    => '504100',
				'familia_id'    => 5,
				'subfamilia_id' => 5,

			),
			1 =>
			array (
				'id'            => 2,
				'codigo'        => '504.101',
				'descripcion'   => 'CODO B/ROSCADO H-H 3/4',
				'orden'         => 'aa',
				'presentacion'  => '100',
				'precio'        => '250',
				'oferta'		=> '20',
				'file_image'    => '',
				'familia_id'    => 5,
				'subfamilia_id' => 5,

			),
			2 =>
			array (
				'id'            => 3,
				'codigo'        => '504.102',
				'descripcion'   => 'CODO B/ROSCADO H-H 1',
				'orden'         => 'aa',
				'presentacion'  => '100',
				'precio'        => '250',
				'oferta'		=> '0',
				'file_image'    => '504102',
				'familia_id'    => 5,
				'subfamilia_id' => 5,

			),
			3 =>
			array (
				'id'            => 4,
				'codigo'        => '504.103',
				'descripcion'   => 'CODO B/ROSCADO H-H 1 1/4',
				'orden'         => 'aa',
				'presentacion'  => '100',
				'precio'        => '250',
				'oferta'		=> '0',
				'file_image'    => '',
				'familia_id'    => 5,
				'subfamilia_id' => 5,

			),
		));
    }
}
