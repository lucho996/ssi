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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
#DEFINIR MODDLEWARE
Route::middleware(['auth'])->group(function(){


Route::get('/intranet/index', function () {
    return view('intranet.index');
});


//Rutas para el personal

Route::get('personal/index', 'PersonalController@index')->name('personal.index')
->middleware('permission:personal.index');
Route::get('/personal/edit/{RUTP}', 'PersonalController@edit')
->middleware('permission:personal.edit');
Route::post('/personal/edit/{RUTP}', 'PersonalController@edit')
->middleware('permission:personal.edit');
Route::get('/personal/show/{RUTP}', 'PersonalController@show')
->middleware('permission:personal.show');


Route::get('/personal/carga_familiar/{RUTP}', 'PersonalController@carga_familiar')
->middleware('permission:personal.carga_familiar');


Route::post('/personal/store_carga/{RUTP}', 'PersonalController@store_carga')
->middleware('permission:personal.carga_familiar');





Route::post('/personal/cargos/{RUTP}', 'PersonalController@cargos')
->middleware('permission:personal.cargos');
Route::get('/personal/cargos/{RUTP}', 'PersonalController@cargos')
->middleware('permission:personal.cargos');


//Route::post('/personal/store', 'PersonalController@store');
Route::post('/personal/storec', 'PersonalController@storec')
->middleware('permission:personal.createc');
Route::get('/personal/createc', 'PersonalController@createc')
->middleware('permission:personal.createc');
Route::post('/personal/createc', 'PersonalController@createc')
->middleware('permission:personal.createc');
Route::post('/personal/store2', array('as'=>'store2','uses'=>'PersonalController@store2'))
->middleware('permission:personal.create');
Route::post('/personal/update/{RUTP}', 'PersonalController@update')
->middleware('permission:personal.edit');
Route::get('/personal/destroy/{RUTP}', 'PersonalController@destroy')
->middleware('permission:personal.destroy');
Route::resource('personal', 'PersonalController')
->middleware('permission:personal');


//Rutas para el cliente
Route::post('/clientes/store', 'ClientesController@store')
->middleware('permission:clientes.create');
Route::get('/clientes/destroy/{RUT_CLIENTE}', 'ClientesController@destroy')
->middleware('permission:clientes.destroy');
Route::get('/clientes/edit/{RUT_CLIENTE}', 'ClientesController@edit')
->middleware('permission:clientes.edit');
Route::post('/clientes/edit/{RUT_CLIENTE}', 'ClientesController@edit')
->middleware('permission:clientes.edit');
Route::post('/clientes/update/{RUT_CLIENTE}', 'ClientesController@update')
->middleware('permission:clientes.edit');
Route::resource('clientes', 'ClientesController')
->middleware('permission:clientes');
Route::get('/clientes/show/{RUT_CLIENTE}', 'ClientesController@show')
->middleware('permission:clientes.show');



//Rutas para el inventario
Route::post('/inventario/store', 'InventarioController@store')
->middleware('permission:inventario.create');
Route::post('/inventario/update/{ID_INVENTARIO}', 'InventarioController@update')
->middleware('permission:inventario.edit');
Route::get('/inventario/destroy/{ID_INVENTARIO}', 'InventarioController@destroy')
->middleware('permission:inventario.destroy');
Route::get('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit')
->middleware('permission:inventario.edit');
Route::post('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit')
->middleware('permission:inventario.edit');
Route::resource('inventario', 'InventarioController')
->middleware('permission:inventario');
Route::get('/inventario/show/{ID_INVENTARIO}', 'InventarioController@show')
->middleware('permission:inventario.show');




//Rutas para el proveedor
Route::get('/proveedor/edit/{RUT}', 'ProveedorController@edit')
->middleware('permission:proveedor.edit');
Route::post('/proveedor/edit/{RUT}', 'ProveedorController@edit')
->middleware('permission:proveedor.edit');
Route::get('/proveedor/show/{RUT}', 'ProveedorController@show')
->middleware('permission:proveedor.show');
Route::post('/proveedor/store', 'ProveedorController@store')
->middleware('permission:proveedor.create');
Route::post('/proveedor/update/{RUT}', 'ProveedorController@update')
->middleware('permission:proveedor.edit');
Route::get('/proveedor/destroy/{RUT}', 'ProveedorController@destroy')
->middleware('permission:proveedor.destroy');
Route::resource('proveedor', 'ProveedorController')
->middleware('permission:proveedor');

//Rutas para el producto
Route::get('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit')
->middleware('permission:producto.edit');
Route::post('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit')
->middleware('permission:producto.edit');
Route::get('/producto/show/{ID_PRODUCTO}', 'ProductoController@show')
->middleware('permission:producto.show');
Route::post('/producto/store', 'ProductoController@store')
->middleware('permission:producto.create');
Route::post('/producto/update/{ID_PRODUCTO}', 'ProductoController@update')
->middleware('permission:producto.edit');
Route::get('/producto/destroy/{ID_PRODUCTO}', 'ProductoController@destroy')
->middleware('permission:producto.destroy');
Route::get('/producto/index/{ID_COTIZACION}', 'ProductoController@index')
->middleware('permission:producto.index');
Route::post('/producto/index/{ID_COTIZACION}', 'ProductoController@index')
->middleware('permission:producto.index');
Route::resource('producto', 'ProductoController')
->middleware('permission:producto');

//Rutas para el equipo a utilizar
Route::get('/equipos_internos/edit/{ID_EH}', 'Equipo_internoController@edit')
->middleware('permission:equipos_internos.edit');
Route::post('/equipos_internos/edit/{ID_EH}', 'Equipo_internoController@edit')
->middleware('permission:equipos_internos.edit');
Route::get('/equipos_internos/show/{ID_EH}', 'Equipo_internoController@show')
->middleware('permission:equipos_internos.show');
Route::post('/equipos_internos/store', 'Equipo_internoController@store')
->middleware('permission:equipos_internos.create');
Route::post('/equipos_internos/update/{ID_EH}', 'Equipo_internoController@update')
->middleware('permission:equipos_internos.edit');
Route::get('/equipos_internos/destroy/{ID_EH}', 'Equipo_internoController@destroy')
->middleware('permission:equipos_internos.destroy');
Route::resource('equipos_internos', 'Equipo_internoController')
->middleware('permission:equipos_internos');

//rutas para las cotizaciones
Route::get('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit')
->middleware('permission:cotizacion.edit');
Route::post('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit')
->middleware('permission:cotizacion.edit');
Route::get('/cotizacion/show/{ID_COTIZACION}', 'CotizacionController@show')
->middleware('permission:cotizacion.show');
Route::post('/cotizacion/store', array('as'=>'store','uses'=>'CotizacionController@store'))
->middleware('permission:cotizacion.create');
Route::post('/cotizacion/update/{ID_COTIZACION}', 'CotizacionController@update')
->middleware('permission:cotizacion.edit');
Route::get('/cotizacion/destroy/{ID_COTIZACION}', 'CotizacionController@destroy')
->middleware('permission:cotizacion.destroy');
Route::resource('cotizacion', 'CotizacionController')
->middleware('permission:cotizacion');


//rutas para usuarios
Route::get('users', 'UserController@index')
->middleware('permission:users.index');

Route::put('users/{user}', 'UserController@update')->name('users.update')
->middleware('permission:users.edit');

Route::get('users/create', 'UserController@create')->name('users.create')
->middleware('permission:users.create');

Route::post('users/store', 'UserController@store')->name('users.store')
->middleware('permission:users.create');

Route::get('users/{user}', 'UserController@show')->name('users.show')
->middleware('permission:users.show');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
->middleware('permission:users.destroy');

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
->middleware('permission:users.edit');


//rutas para roles
Route::get('roles', 'RoleController@index')
->middleware('permission:roles.index');

Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
->middleware('permission:roles.edit');

Route::get('roles/create', 'RoleController@create')->name('roles.create')
->middleware('permission:roles.create');

Route::post('roles/store', 'RoleController@store')->name('roles.store')
->middleware('permission:roles.create');

Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
->middleware('permission:roles.show');

Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
->middleware('permission:roles.destroy');

Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
->middleware('permission:roles.edit');

});

