<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('empresas')->insert(array (
			0 => 
			array (
				'id'          => 1,
				'file_image'  => 'empresa__empresa.jpg',
				'descripcion' => 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. 
								  Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores. 
								  Nuestra misión es continuar con el crecimiento y consolidar nuestro rol en el mercado argentino. No dude consultarnos ante cualquier duda.
								  Nuestros principios están basados en consolidar una buena relación de confianza, trabajo y profesionalismo junto con nuestros clientes y proveedores. Basamos nuestro trabajo en el constante desarrollo y mejoras tecnológicas. Nuestro compromiso ha sido y será siempre la calidad del producto.',
			),
		));  
    }
}
