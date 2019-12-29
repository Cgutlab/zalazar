<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DescuentosTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DatosTableSeeder::class);
        $this->call(LogosTableSeeder::class);
        $this->call(MetadatosTableSeeder::class);
        $this->call(CondicionsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(ClasificacionsTableSeeder::class);
        $this->call(NovedadesTableSeeder::class);
        $this->call(FamiliasTableSeeder::class);
        $this->call(SubfamiliasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(DestacadosTableSeeder::class);
        $this->call(InformacionsTableSeeder::class);
        $this->call(CatalogosTableSeeder::class);
    }
}
