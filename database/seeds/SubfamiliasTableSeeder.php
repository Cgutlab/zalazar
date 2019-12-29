<?php

use Illuminate\Database\Seeder;

class SubfamiliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('subfamilias')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'nombre'     => 'Ninguna',
				'orden'      => 'aa',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 1,
				'file_ficha' => null,
				'file_image' => null,
			),
			1 => 
			array (
				'id'         => 2,
				'nombre'     => 'Arandelas de Bronce Roscado',
				'orden'      => 'aa',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia1.jpg'
			),
			2 => 
			array (
				'id'         => 3,
				'nombre'     => 'Bridas de Bronce Roscado',
				'orden'      => 'bb',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia2.jpg'
			),
			3 => 
			array (
				'id'         => 4,
				'nombre'     => 'Buje Reducción de Bronce Roscado',
				'orden'      => 'cc',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia3.jpg'
			),
			4 => 
			array (
				'id'         => 5,
				'nombre'     => 'Codos de Bronce Roscado',
				'orden'      => 'dd',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia4.jpg'
			),
			5 => 
			array (
				'id'         => 6,
				'nombre'     => 'Colector Cruz de Bronce Roscado',
				'orden'      => 'ee',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia5.jpg'
			),
			6 => 
			array (
				'id'         => 7,
				'nombre'     => 'Cruz de Bronce Roscado ',
				'orden'      => 'ff',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia6.jpg'
			),
			7 => 
			array (
				'id'         => 8,
				'nombre'     => 'Cuplas de Bronce Roscado',
				'orden'      => 'gg',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia7.jpg'
			),
			8 => 
			array (
				'id'         => 9,
				'nombre'     => 'Curvas de Bronce Roscado',
				'orden'      => 'hh',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia8.jpg'
			),
			9 => 
			array (
				'id'         => 10,
				'nombre'     => 'Rosca con Tuerca de Bronce Roscado',
				'orden'      => 'ii',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia9.jpg'
			),
			10 => 
			array (
				'id'         => 11,
				'nombre'     => 'Rosca Sencilla',
				'orden'      => 'jj',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia10.jpg'
			),
			11 => 
			array (
				'id'         => 12,
				'nombre'     => 'Tapas de Bronce Roscado',
				'orden'      => 'kk',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia11.jpg'
			),
			12 => 
			array (
				'id'         => 13,
				'nombre'     => 'Tee de Bronce Roscado',
				'orden'      => 'll',
				'descripcion'=> 'Somos Zalazar Distribuidora. Una empresa de amplia trayectoria. Nos dedicamos a la fabricación y distribución de repuestos sanitarios, articulos de gas y ferreterías. Con una experiencia de más de 20 años en la industria, con un amplio catálogo de productos para varios sectores.',
				'familia_id' => 5,
				'file_ficha' => null,
				'file_image' => 'subfamilias__subfamilia12.jpg'
			),
		));
    }
}
