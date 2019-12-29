<?php

use Illuminate\Database\Seeder;

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('catalogos')->insert(array (
	  		0 =>
	  		array (
				'id'   => 1,
				'link' => 'http://www.youblisher.com/p/1593387-/',
			),
	  	));
    }
}
