<?php

use Illuminate\Database\Seeder;

class NovedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('novedads')->insert(array (
			0 => 
			array (
				'id'    		   => 1,
				'titulo'		   => 'Conocé nuestra planta',
				'texto'        	   => 'Ingresá para conocer más fotos e información sobre nuestra planta ubicada en Villa Luzuriaga, en la provincia de Buenos Aires.
									   Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores. 
									   Nuestra misión es continuar con el crecimiento y consolidar nuestro rol en el mercado argentino. No dude consultarnos ante cualquier duda.',
				'file_image'       => 'novedades__novedad1.jpg',
				'orden'            => 'aa',
				'clasificacion_id' => 2
			),
			1 => 
			array (
				'id'               => 2,
				'titulo'		   => 'Nuevos Depósitos',
				'texto'        	   => 'Ingresá para conocer más fotos e información sobre nuestra planta ubicada en Villa Luzuriaga, en la provincia de Buenos Aires.
									   Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores. 
									   Nuestra misión es continuar con el crecimiento y consolidar nuestro rol en el mercado argentino. No dude consultarnos ante cualquier duda.',
				'file_image'       => 'novedades__novedad2.jpg',
				'orden'            => 'bb',
				'clasificacion_id' => 3
			),
			2 => 
			array (
				'id'               => 3,
				'titulo'		   => 'Atención al Público',
				'texto'        	   => 'Ingresá para conocer más fotos e información sobre nuestra planta ubicada en Villa Luzuriaga, en la provincia de Buenos Aires.
									   Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores. 
									   Nuestra misión es continuar con el crecimiento y consolidar nuestro rol en el mercado argentino. No dude consultarnos ante cualquier duda.',
				'file_image'       => 'novedades__novedad3.jpg',
				'orden'            => 'cc',
				'clasificacion_id' => 2
			),
			3 => 
			array (
				'id'               => 4,
				'titulo'		   => 'Catálogo de Productos 2018',
				'texto'        	   => 'Ingresá para conocer más fotos e información sobre nuestra planta ubicada en Villa Luzuriaga, en la provincia de Buenos Aires.
									   Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores. 
									   Nuestra misión es continuar con el crecimiento y consolidar nuestro rol en el mercado argentino. No dude consultarnos ante cualquier duda.',
				'file_image'       => 'novedades__novedad4.jpg',
				'orden'            => 'dd',
				'clasificacion_id' => 3
			),
		));
    }
}
