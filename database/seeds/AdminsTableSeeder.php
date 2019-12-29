<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id'       => 1,
                'tipo'     => 'admin',
                'name'     => 'Pablo',
                'username' => 'pablo',
                'password' => bcrypt('pablo'),
            ),
            1 =>
            array (
                'id'       => 2,
                'tipo'     => 'usuario',
                'name'     => 'Ana',
                'username' => 'ana',
                'password' => bcrypt('anita'),
            ),
        ));
    }
}
