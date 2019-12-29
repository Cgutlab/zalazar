<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('users')->insert(array (
            0 =>
            array (
                'id'           => 1,
                'name'         => 'Ninguno',
                'username'     => 'ninguno',
                'email'        => 'Ninguno@osole.es',
                'tipo'         => 'vendedor',
                'parent_id'    => 1,
                'descuento_id' => 1,
                'password'     => bcrypt('osole'),
            ),
    		1 =>
    		array (
                'id'           => 2,
                'name'         => 'Osole Vendedor',
                'username'     => 'vendedor',
                'email'        => 'vendedor@osole.es',
                'tipo'         => 'vendedor',
                'parent_id'    => 1,
                'descuento_id' => 1,
                'password'     => bcrypt('osole'),
    		),
    		2 =>
    		array (
                'id'           => 3,
                'name'         => 'Osole Comprador',
                'username'     => 'comprador',
                'email'        => 'comprador@osole.es',
                'tipo'         => 'cliente',
                'parent_id'    => 2,
                'descuento_id' => 2,
                'password'     => bcrypt('osole'),
    		),
    	));
    }
}
