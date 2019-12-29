<?php

use Illuminate\Database\Seeder;

class DestacadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('destacados')->insert(array (
			0 => 
			array (
				'id'         => 2,
				'subfamilia_id' => 2,
				'orden'      => 'bb',
			),
			1 => 
			array (
				'id'         => 3,
				'subfamilia_id' => 3,
				'orden'      => 'cc',
			),
			2 => 
			array (
				'id'         => 4,
				'subfamilia_id' => 4,
				'orden'      => 'aa',
			),
			3 => 
			array (
				'id'         => 5,
				'subfamilia_id' => 5,
				'orden'      => 'bb',
			),
			4 => 
			array (
				'id'         => 6,
				'subfamilia_id' => 6,
				'orden'      => 'cc',
			),
			5 => 
			array (
				'id'         => 7,
				'subfamilia_id' => 7,
				'orden'      => 'bb',
			),
			6 => 
			array (
				'id'         => 8,
				'subfamilia_id' => 8,
				'orden'      => 'cc',
			),
			7 => 
			array (
				'id'         => 9,
				'subfamilia_id' => 9,
				'orden'      => 'cc',
			),
		));
    }
}
