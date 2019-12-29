<?php

use Illuminate\Database\Seeder;

class DatosTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			\DB::table('datos')->insert(array (
				0 =>
				array (
					'id'          => 1,
					'tipo'        => 'telefono_fax',
					'descripcion' => '(54 11) 4466-2705',
					'status'      => 1,
				),
				1 =>
				array (
					'id'          => 2,
					'tipo'        => 'telefono',
					'descripcion' => '2204-0995',
					'status'      => 1,
				),
				2 =>
				array (
					'id'          => 3,
					'tipo'        => 'email',
					'descripcion' => 'info@zalazar.com.ar',
					'status'      => 1,
				),
				3 =>
				array (
					'id'          => 4,
					'tipo'        => 'whatsapp',
					'descripcion' => '11 3694-5737',
					'status'      => 1,
				),
			));
		}
}
