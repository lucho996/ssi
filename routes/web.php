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

Route::get('/', function () {
    return view('inicio');
});
Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/intranet/index', function () {
    return view('intranet.index');
});
//Rutas para el personal

Route::get('/personal/edit/{RUTP}', 'PersonalController@edit');
Route::post('/personal/edit/{RUTP}', 'PersonalController@edit');
Route::get('/personal/show/{RUTP}', 'PersonalController@show');
Route::post('/personal/store', 'PersonalController@store');
Route::post('/personal/update/{RUTP}', 'PersonalController@update');
Route::get('/personal/destroy/{RUTP}', 'PersonalController@destroy');
Route::resource('personal', 'PersonalController');


//Rutas para el cliente
Route::post('/clientes/store', 'ClientesController@store');
Route::get('/clientes/destroy/{RUT_CLIENTE}', 'ClientesController@destroy');
Route::get('/clientes/edit/{RUT_CLIENTE}', 'ClientesController@edit');
Route::post('/clientes/edit/{RUT_CLIENTE}', 'ClientesController@edit');
Route::post('/clientes/update/{RUT_CLIENTE}', 'ClientesController@update');
Route::resource('clientes', 'ClientesController');
Route::get('/clientes/show/{RUT_CLIENTE}', 'ClientesController@show');



//Rutas para el inventario
Route::post('/inventario/store', 'InventarioController@store');
Route::post('/inventario/update/{ID_INVENTARIO}', 'InventarioController@update');
Route::get('/inventario/destroy/{ID_INVENTARIO}', 'InventarioController@destroy');
Route::get('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit');
Route::post('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit');
Route::resource('inventario', 'InventarioController');
Route::get('/inventario/show/{ID_INVENTARIO}', 'InventarioController@show');




//Rutas para el proveedor
Route::get('/proveedor/edit/{RUT}', 'ProveedorController@edit');
Route::post('/proveedor/edit/{RUT}', 'ProveedorController@edit');
Route::get('/proveedor/show/{RUT}', 'ProveedorController@show');
Route::post('/proveedor/store', 'ProveedorController@store');
Route::post('/proveedor/update/{RUT}', 'ProveedorController@update');
Route::get('/proveedor/destroy/{RUT}', 'ProveedorController@destroy');
Route::resource('proveedor', 'ProveedorController');

//Rutas para el producto
Route::get('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit');
Route::post('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit');
Route::get('/producto/show/{ID_PRODUCTO}', 'ProductoController@show');
Route::post('/producto/store', 'ProductoController@store');
Route::post('/producto/update/{ID_PRODUCTO}', 'ProductoController@update');
Route::get('/producto/destroy/{ID_PRODUCTO}', 'ProductoController@destroy');
Route::get('/producto/index/{ID_COTIZACION}', 'ProductoController@index');
Route::post('/producto/index/{ID_COTIZACION}', 'ProductoController@index');
Route::resource('producto', 'ProductoController');

//Rutas para el equipo a utilizar
Route::get('/equipos_internos/edit/{ID_EH}', 'Equipo_internoController@edit');
Route::post('/equipos_internos/edit/{ID_EH}', 'Equipo_internoController@edit');
Route::get('/equipos_internos/show/{ID_EH}', 'Equipo_internoController@show');
Route::post('/equipos_internos/store', 'Equipo_internoController@store');
Route::post('/equipos_internos/update/{ID_EH}', 'Equipo_internoController@update');
Route::get('/equipos_internos/destroy/{ID_EH}', 'Equipo_internoController@destroy');
Route::resource('equipos_internos', 'Equipo_internoController');

//rutas para las cotizaciones
Route::get('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit');
Route::post('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit');
Route::get('/cotizacion/show/{ID_COTIZACION}', 'CotizacionController@show');
Route::post('/cotizacion/store', array('as'=>'store','uses'=>'CotizacionController@store'));
Route::post('/cotizacion/update/{ID_COTIZACION}', 'CotizacionController@update');
Route::get('/cotizacion/destroy/{ID_COTIZACION}', 'CotizacionController@destroy');
Route::resource('cotizacion', 'CotizacionController');

