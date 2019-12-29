<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SeccionHomeController@index');
Route::get('/search', 'SeccionHomeController@buscador');
Route::get('busqueda', 'SeccionHomeController@busqueda');

Route::get('empresa', 'SeccionEmpresaController@index');

Route::get('ofertas', 'SeccionOfertaController@index');

Route::get('catalogo', 'SeccionCatalogoController@index');

Route::get('listado', 'SeccionPrecioController@index');

Route::get('historial', 'SeccionPrivadaController@historico');

//Sección de Novedades
Route::get('/novedades', 'SeccionNovedadesController@index');
Route::get('/novedades/filtros/{id}', 'SeccionNovedadesController@filter')->name('filtros');
Route::get('/novedades/ver/{id}', 'SeccionNovedadesController@ver')->name('ver');


//Sección de Contacto
Route::resource('/contacto', 'SeccionContactoController');
Route::post('registro', 'SeccionContactoController@registro')->name('enviar-correo');

//Descarga-Seccion
	Route::get('/catalogo-view/{file}', function ($file) {
		return Storage::response("descargas/$file");
	})->name('descargas-view');

	Route::get('/catalogo-down/{file}', function ($file) {
		return Storage::download("descargas/$file");
	})->name('descargas-down');


//Descarga-Lista de Precios
	Route::get('/listado-view/{file}', function ($file) {
		return Storage::response("listado/$file");
	})->name('listado-view');

	Route::get('/listado-down/{file}', function ($file) {
		return Storage::download("listado/$file");
	})->name('listado-down');


Route::get('novedades', 'SeccionNovedadesController@index');


//Seccion de Productos
Route::get('/productos', 'SeccionProductoController@index');
Route::get('/productos/{id}', 'SeccionProductoController@show');
Route::get('/productos/verProductos/{id}', 'SeccionProductoController@showProductos');
Route::get('/productos/ver/{id}/{tipo}', 'SeccionProductoController@showProducto');

Route::get('/productos-down/{file}', function ($file) {
	return Storage::download("subfamilias/$file");
})->name('productos-down');


Auth::routes();


Route::prefix('privada')->group(function () {

	Route::get('/', 'SeccionPrivadaController@index')->name('privada');
	Route::get('/cliente/{id}', 'SeccionPrivadaController@cliente')->name('privada');
	Route::post('store', 'SeccionPrivadaController@store');
	Route::post('remove', 'SeccionPrivadaController@remover');
	Route::post('update', 'SeccionPrivadaController@update');

	Route::get('pedido', 'SeccionPrivadaController@pedido');
	Route::post('confirmar', 'SeccionPrivadaController@confirmar');
	Route::post('enviar', 'MailController@enviarMail');
});


Route::prefix('adm')->group(function () {

	//Rutas para la gestión de usuarios administrativos
	Route::get('home', 'AdminController@index')->name('admin.dashboard');
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::get('admin/register', 'AdminController@create')->name('admin.register');
	Route::post('admin/register', 'AdminController@store')->name('admin.register.store');
	Route::get('/', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
	Route::get('admin/listar', 'AdminController@listar');
	Route::get('admin/edit/{id}', 'AdminController@edit');
	Route::put('admin/update/{id}', 'AdminController@update');
	Route::get('admin/eliminar/{id}', 'AdminController@eliminar');


// Admin Home
	Route::prefix('home')->group(function () {

			Route::get('/', 'HomeController@index');
			
		// Admin Destacados
			Route::resource('destacados', 'DestacadoController');

		//Información principal de la empresa
			Route::get('/informacion/ver', 'HomeController@indexInformacion');
			Route::get('/informacion/{id}', 'HomeController@editInformacion');
			Route::put('/informacion/{id}', 'HomeController@updateInformacion');

	});

	
	//Ruta para la gestión de logos
	Route::resource('general/condiciones', 'CondicionController');
	
	//Ruta para la gestión de logos
	Route::resource('logos', 'LogoController');

	//Ruta para la gestión de metadatos
	Route::resource('metadatos', 'MetadatoController');

	//Ruta para la gestión de descuentos
	Route::resource('descuentos', 'DescuentoController');

	//Ruta para la gestión de usuarios 
	Route::prefix('empresa/')->group(function () {
		Route::resource('index', 'EmpresaController');
	});


	//Ruta para la gestión de novedades
	Route::prefix('novedades/')->group(function () {
		Route::resource('index', 'NovedadController')->except(['show']);
		Route::get('delete/{id}', 'NovedadController@eliminar');
			
		//Categorias de Novedades
			Route::resource('/categorias', 'ClasificacionController');
			Route::get('/categorias/delete/{id}', 'ClasificacionController@eliminar');

		Route::prefix('galerias/')->group(function () {
			Route::get('index/{id}', 'ImagenController@index');
			Route::get('create/{id}', 'ImagenController@create');
			Route::post('store', 'ImagenController@store');
			Route::get('edit/{id}', 'ImagenController@edit');
			Route::put('update/{id}', 'ImagenController@update');
			Route::get('delete/{id}', 'ImagenController@eliminar');
		});
	});


	//Ruta para la gestión de sliders
	Route::get('{seccion}/slider/', 'SliderController@index');
	Route::get('{seccion}/slider/crear/', 'SliderController@create');
	Route::post('{seccion}/slider', 'SliderController@store');
	Route::get('{seccion}/slider/edit/{id}', 'SliderController@edit');
	Route::put('{seccion}/slider/update/{id}', 'SliderController@update');
	Route::get('slider/delete/{id}', 'SliderController@eliminar');

	//Ruta para la gestión de contacto y redes
	Route::prefix('datos')->group(function () {
		Route::get('contacto', 'DatoController@contacto');
		Route::get('contacto/edit/{id}', 'DatoController@editContacto');
		Route::get('redes', 'DatoController@redes');
		Route::get('redes/edit/{id}', 'DatoController@editRedes');
		Route::put('update/{id}', 'DatoController@update');
	});

	//Ruta para la gestión de descuentos
	Route::resource('catalogo', 'CatalogoController');


    // Admin Listado de PRecios
	Route::prefix('listado')->group(function () {
	//Descargas de Catálogo
		Route::resource('/descargas', 'PrecioController');
		Route::get('delete/{id}', 'PrecioController@eliminar');
	});


	// Admin Familias
	Route::prefix('productos')->group(function () {

		Route::resource('/index', 'ProductoController');
		Route::get('/select/subfamilias', 'ProductoController@subfamilias');
		Route::get('/delete/{id}', 'ProductoController@eliminar');

		Route::resource('familias', 'FamiliaController');
		Route::get('familias/delete/{id}', 'FamiliaController@eliminar');

		Route::resource('subfamilias', 'SubfamiliaController');
		Route::get('subfamilias/delete/{id}', 'SubfamiliaController@eliminar');

		Route::get('carga', 'ProductoController@carga');
		Route::post('archivo', 'ProductoController@archivo');

		Route::prefix('galerias/')->group(function () {
			Route::get('index/{id}', 'GaleriaController@index');
			Route::get('create/{id}', 'GaleriaController@create');
			Route::post('store', 'GaleriaController@store');
			Route::get('edit/{id}', 'GaleriaController@edit');
			Route::put('update/{id}', 'GaleriaController@update');
			Route::get('delete/{id}', 'GaleriaController@eliminar');
		});


	});

	//Ruta para la gestión de clientes/Vendedores
	Route::prefix('usuarios')->group(function () {
		Route::get('{tipo}/index/', 'UserController@index');
		Route::get('{tipo}/create', 'UserController@create');
		Route::post('{tipo}/store', 'UserController@store');
		Route::get('{tipo}/edit/{id}', 'UserController@edit');
		Route::put('{tipo}/update/{id}', 'UserController@update');
		Route::get('{tipo}/delete/{id}', 'UserController@eliminar');

		Route::get('descuentos/{id}', 'ClienteDescuentoController@index')->name('descuentos.index');
		Route::get('descuentos/{tipo}/edit/{id}', 'ClienteDescuentoController@edit');
		Route::put('descuentos/{tipo}/update/{id}', 'ClienteDescuentoController@update');
		Route::get('descuentos/create/{id}', 'ClienteDescuentoController@create');
		Route::post('descuentos/', 'ClienteDescuentoController@store');
		Route::get('delete/{tipo}/{id}/{user}', 'ClienteDescuentoController@eliminar');
	});


});
