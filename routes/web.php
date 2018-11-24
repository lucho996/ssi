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
Route::get('/personal/pdf/{RUTP}', 'PersonalController@pdf')
->middleware('permission:personal.pdf');
Route::delete('/personal/carga_familiar/{carga_familiar}', 'PersonalController@destroy')->name('personal.destroy')
->middleware('permission:personal.destroy');
Route::put('/personal/updatee/{ID_CARGA_FAMILIAR}', 'PersonalController@updatee')->name('personal.updatee')
->middleware('permission:personal.modificar_carga');
Route::post('/personal/modificar_carga/{ID_CARGA_FAMILIAR}', 'PersonalController@modificar_carga')
->middleware('permission:personal.modificar_carga');
Route::get('/personal/modificar_carga/{ID_CARGA_FAMILIAR}', 'PersonalController@modificar_carga')
->middleware('permission:personal.modificar_carga');
Route::post('/personal/store_carga', 'PersonalController@store_carga')
->middleware('permission:personal.carga_familiar');
Route::get('/personal/carga_familiar/{RUTP}', 'PersonalController@carga_familiar')
->middleware('permission:personal.carga_familiar');
Route::post('/personal/store_cargos', 'PersonalController@store_cargos')
->middleware('permission:personal.cargos');
Route::get('/personal/cargos/{RUTP}', 'PersonalController@create_cargos')
->middleware('permission:personal.cargos');
Route::delete('/personal/cargos/{cargo_personal}', 'PersonalController@destroy_c')->name('personal.destroy_c')
->middleware('permission:personal.destroy_c');
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
Route::resource('personal', 'PersonalController')
->middleware('permission:personal');

//Rutas para el inventario
Route::post('/inventario/store', 'InventarioController@store')
->middleware('permission:inventario.create');
Route::post('/inventario/update/{ID_INVENTARIO}', 'InventarioController@update')
->middleware('permission:inventario.edit');
Route::get('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit')
->middleware('permission:inventario.edit');
Route::get('/inventario/destroy/{ID_INVENTARIO}', 'InventarioController@destroy')
->middleware('permission:inventario.destroy');
Route::post('/inventario/edit/{ID_INVENTARIO}', 'InventarioController@edit')
->middleware('permission:inventario.edit');
Route::resource('inventario', 'InventarioController')
->middleware('permission:inventario');
Route::get('/inventario/show/{ID_INVENTARIO}', 'InventarioController@show')
->middleware('permission:inventario.show');

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

//IVA
Route::get('/iva/edit/{RUT}', 'IvaController@edit')
->middleware('permission:iva.edit');
Route::post('/iva/edit/{RUT}', 'IvaController@edit')
->middleware('permission:iva.edit');
Route::get('/iva/show/{RUT}', 'IvaController@show')
->middleware('permission:iva.show');
Route::post('/iva/store', 'IvaController@store')
->middleware('permission:iva.create');
Route::post('/iva/update/{RUT}', 'IvaController@update')
->middleware('permission:iva.edit');
Route::get('/iva/destroy/{RUT}', 'IvaController@destroy')
->middleware('permission:iva.destroy');
Route::resource('iva', 'IvaController')
->middleware('permission:iva');

//Rutas para el producto
Route::get('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit')
->middleware('permission:producto.edit');
Route::post('/producto/edit/{ID_PRODUCTO}', 'ProductoController@edit')
->middleware('permission:producto.edit');
Route::get('/producto/show/{ID_PRODUCTO}', 'ProductoController@show')
->middleware('permission:producto.show');

Route::post('/producto/store_ocm', 'ProductoController@store_ocm')
->middleware('permission:producto.orden_compra_m');


Route::get('/producto/orden_compra_m/{RUT}/{ID_PRODUCTO}', 'ProductoController@orden_compra_m')
->middleware('permission:producto.orden_compra_m');

Route::get('/findPrice2',array('as'=>'findPrice2','uses'=>'ProductoController@findPrice2'));




Route::post('/producto/update/{ID_PRODUCTO}', 'ProductoController@update')
->middleware('permission:producto.edit');

Route::get('/producto/edit2/{ID_PRODUCTO}', 'ProductoController@edit2')
->middleware('permission:producto.edit2');

Route::get('/producto/subir_plano/{ID_PRODUCTO}', 'ProductoController@subir_plano')
->middleware('permission:producto.subir_plano');
Route::put('/producto/update_p/{ID_PRODUCTO}', 'ProductoController@update_p')->name('producto.update_p')
->middleware('permission:producto.subir_plano');

Route::post('/producto/edit2/{ID_PRODUCTO}', 'ProductoController@edit2')
->middleware('permission:producto.edit2');
Route::get('/producto/orden_trabajo/{ID_PRODUCTO}', 'ProductoController@orden_trabajo')
->middleware('permission:producto.orden_trabajo');
Route::put('/producto/update2/{ID_PRODUCTO}', 'ProductoController@update2')->name('producto.update2')
->middleware('permission:producto.edit2');

Route::delete('/producto/destroy/{ID_PRODUCTO}', 'ProductoController@destroy')
->middleware('permission:producto.destroy');
Route::post('/producto/store4',  array('as'=>'store4','uses'=>'ProductoController@store4'))
->middleware('permission:producto.create');


Route::post('/producto/store5',  array('as'=>'store5','uses'=>'ProductoController@store5'))
->middleware('permission:convenio.cotizarconvenio2');


Route::get('/producto/index/{ID_COTIZACION}', 'ProductoController@index')
->middleware('permission:producto.index');
Route::post('/producto/index/{ID_COTIZACION}', 'ProductoController@index')
->middleware('permission:producto.index');

Route::post('/producto/store_pro', 'ProductoController@store_pro')
->middleware('permission:producto.index2');

Route::post('/producto/store_pro_coti', 'ProductoController@store_pro_coti')
->middleware('permission:producto.index');

Route::delete('/producto/index2/{ID_PRODUCTO}', 'ProductoController@destroy_pro')->name('producto.destroy_pro')
->middleware('permission:producto.destroy_pro');

Route::get('/producto/index2/{ID_CONVENIO}', 'ProductoController@index2')
->middleware('permission:producto.index2');
Route::post('/producto/index2/{ID_CONVENIO}', 'ProductoController@index2')
->middleware('permission:producto.index2');
Route::get('/json-personalcargo','ProductoController@personalcargo');
Route::get('/findPrice',array('as'=>'findPrice','uses'=>'ProductoController@findPrice'));
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


Route::post('/cotizacion/store_orden', 'CotizacionController@store_orden')->name('store_orden')
->middleware('permission:cotizacion.guia');
Route::get('/cotizacion/guia/{ID_COTIZACION}', 'CotizacionController@create_orden')
->middleware('permission:cotizacion.guia');

Route::get('/cotizacion/show', 'CotizacionController@show2')
->middleware('permission:cotizacion.show');

Route::get('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit')
->middleware('permission:cotizacion.edit');
Route::post('/cotizacion/edit/{ID_COTIZACION}', 'CotizacionController@edit')
->middleware('permission:cotizacion.edit');
Route::get('/cotizacion/show/{ID_COTIZACION}', 'CotizacionController@show')
->middleware('permission:cotizacion.show');
Route::post('/cotizacion/store', array('as'=>'store','uses'=>'CotizacionController@store'))
->middleware('permission:cotizacion.create');
Route::get('/producto/create/{ID_PRODUCTO}', 'ProductoController@create')
->middleware('permission:producto.create');
Route::post('/cotizacion/update/{ID_COTIZACION}', 'CotizacionController@update')
->middleware('permission:cotizacion.edit');
Route::get('/cotizacion/destroy/{ID_COTIZACION}', 'CotizacionController@destroy')
->middleware('permission:cotizacion.destroy');
Route::resource('cotizacion', 'CotizacionController')
->middleware('permission:cotizacion');

//Convenios



Route::get('/convenio/cotizarconvenio2/{ID_CONVENIO}', 'ProductoController@create3')
->middleware('permission:convenio.cotizarconvenio2');
Route::get('/convenio/cotizarconvenio2', 'ConvenioController@create3')
->middleware('permission:convenio.cotizarconvenio2');
Route::get('/convenio/cotizarconvenio', 'ConvenioController@create2')
->middleware('permission:convenio.cotizarconvenio');
Route::get('/convenio/show', 'ConvenioController@show2')
->middleware('permission:convenio.show');
Route::get('/convenio/edit/{ID_CONVENIO}', 'ConvenioController@edit')
->middleware('permission:convenio.edit');
Route::post('/convenio/edit/{ID_CONVENIO}', 'ConvenioController@edit')
->middleware('permission:convenio.edit');
Route::get('/convenio/show/{ID_CONVENIO}', 'ConvenioController@show')
->middleware('permission:convenio.show');
Route::post('/convenio/store3', array('as'=>'store3','uses'=>'ConvenioController@store3'))
->middleware('permission:convenio.cotizarconvenio3');
Route::get('/producto/create/{ID_PRODUCTO}', 'ProductoController@create')
->middleware('permission:producto.create');
Route::post('/convenio/update/{ID_CONVENIO}', 'ConvenioController@update')
->middleware('permission:convenio.edit');
Route::get('/convenio/destroy/{ID_CONVENIO}', 'ConvenioController@destroy')
->middleware('permission:convenio.destroy');
Route::resource('convenio', 'ConvenioController')
->middleware('permission:convenio');


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

