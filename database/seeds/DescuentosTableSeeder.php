<?php

use Illuminate\Database\Seeder;

class DescuentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('descuentos')->insert(array (
            0 =>
            array (
                'id'   => 1,
                'tipo' => 'Ninguno',
                'monto'=> '0',
            ),
    		1 =>
    		array (
				'id'   => 2,
				'tipo' => 'Cliente A',
				'monto'=> '10',
    		),
    		2 =>
    		array (
				'id'   => 3,
                'tipo' => 'Cliente B',
				'monto'=> '20',
    		),
    	));

    }
}
