<?php

use Illuminate\Database\Seeder;

class LogosTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
  	\DB::table('logos')->insert(array (
  		0 =>
  		array (
  			'id'         => 1,
  			'file_image' => 'logos__logo-principal.png',
  			'ubicacion'  => 'navbar',
  		),
  		1 =>
  		array (
  			'id'         => 2,
  			'file_image' => 'logos__logo-footer.png',
  			'ubicacion'  => 'footer',
  		),
  		2 =>
  		array (
  			'id'         => 3,
  			'file_image' => 'logos__favicon.png',
  			'ubicacion'  => 'favicon',
  		),
  	));
  }
}
