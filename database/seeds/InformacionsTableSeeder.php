<?php

use Illuminate\Database\Seeder;

class InformacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('informacions')->insert(array (
            0 => 
            array (
				'id'         => 1,
				'file_image' => 'home__informacions.jpg',
				'titulo1'    => 'Stock Permanente de nuestro catálogo',
				'titulo2'    => 'Compromiso de excelencia en la calidad',
            ),
        ));
    }
}
