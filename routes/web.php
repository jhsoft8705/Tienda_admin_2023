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
    return redirect()->route('dashboard.index');
});

// auth
Auth::routes();

// dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('profile', 'DashboardController@profile')->name('dashboard.profile');
    Route::get('settings', 'DashboardController@settings')->name('dashboard.settings');
    Route::post('update-profile', 'DashboardController@updateProfile')->name('dashboard.update-profile');
    Route::post('change-password', 'DashboardController@changePassword')->name('dashboard.change-password');
});

//Usuarios
Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('create', 'UserController@create')->name('users.create');
    Route::post('store', 'UserController@store')->name('users.store');
    Route::get('{id}/edit', 'UserController@edit')->name('users.edit');
    Route::post('update', 'UserController@update')->name('users.update');
});


//Banners
Route::prefix('banners')->group(function () {
    Route::get('/', 'BannersController@index')->name('banners.index');
    Route::post('update', 'BannersController@update')->name('banners.update');
});

//FAQ
Route::prefix('faq')->group(function () {
    Route::get('/', 'FaqController@index')->name('faq.index');
    Route::get('create_seccion', 'FaqController@create_seccion')->name('faq.create_seccion');
    Route::post('store_seccion', 'FaqController@store_seccion')->name('faq.store_seccion');
    Route::get('{id}/edit_seccion', 'FaqController@edit_seccion')->name('faq.edit_seccion');
    Route::post('update_seccion', 'FaqController@update_seccion')->name('faq.update_seccion');
    Route::get('{id}/create_pregunta', 'FaqController@create_pregunta')->name('faq.create_pregunta');
    Route::post('store_pregunta', 'FaqController@store_pregunta')->name('faq.store_pregunta');
    Route::get('{id}/edit_pregunta', 'FaqController@edit_pregunta')->name('faq.edit_pregunta');
    Route::post('update_pregunta', 'FaqController@update_pregunta')->name('faq.update_pregunta');
    Route::post('delete_pregunta', 'FaqController@delete_pregunta')->name('faq.delete_pregunta');
    Route::post('delete_seccion', 'FaqController@delete_seccion')->name('faq.delete_seccion');
});

//Productos
Route::prefix('productos')->group(function () {
    Route::get('/', 'ProductosController@index')->name('productos.index');
    Route::get('create', 'ProductosController@create')->name('productos.create');
    Route::post('store', 'ProductosController@store')->name('productos.store');
    Route::get('{id}/edit', 'ProductosController@edit')->name('productos.edit');
    Route::post('update', 'ProductosController@update')->name('productos.update');
    Route::post('delete', 'ProductosController@delete')->name('productos.delete');
});

//Categorias Producto
Route::prefix('categorias_producto')->group(function () {
    Route::get('create', 'CategoriasProductoController@create')->name('categorias_producto.create');
    Route::post('store', 'CategoriasProductoController@store')->name('categorias_producto.store');
    Route::get('{id}/edit', 'CategoriasProductoController@edit')->name('categorias_producto.edit');
    Route::post('update', 'CategoriasProductoController@update')->name('categorias_producto.update');
    Route::post('delete', 'CategoriasProductoController@delete')->name('categorias_producto.delete');
});

//SubCategorias Producto
Route::prefix('sub_categorias_producto')->group(function () {
    Route::get('{id}/create', 'SubCategoriasProductoController@create')->name('sub_categorias_producto.create');
    Route::post('store', 'SubCategoriasProductoController@store')->name('sub_categorias_producto.store');
    Route::get('{id}/edit', 'SubCategoriasProductoController@edit')->name('sub_categorias_producto.edit');
    Route::post('update', 'SubCategoriasProductoController@update')->name('sub_categorias_producto.update');
    Route::post('delete', 'SubCategoriasProductoController@delete')->name('sub_categorias_producto.delete');
    Route::post('storeProducto', 'SubCategoriasProductoController@storeProducto')->name('sub_categorias_producto.storeProducto');
});



//Marcas Producto
Route::prefix('marcas_producto')->group(function () {
    Route::get('create', 'MarcasProductoController@create')->name('marcas_producto.create');
    Route::post('store', 'MarcasProductoController@store')->name('marcas_producto.store');
    Route::get('{id}/edit', 'MarcasProductoController@edit')->name('marcas_producto.edit');
    Route::post('update', 'MarcasProductoController@update')->name('marcas_producto.update');
    Route::post('delete', 'MarcasProductoController@delete')->name('marcas_producto.delete');
    Route::post('storeProducto', 'MarcasProductoController@storeProducto')->name('marcas_producto.storeProducto');
});

//Colores Producto
Route::prefix('colores_producto')->group(function () {
    Route::get('{id}/create', 'ColoresProductoController@create')->name('colores_producto.create');
    Route::post('store', 'ColoresProductoController@store')->name('colores_producto.store');
    Route::get('{id}/edit', 'ColoresProductoController@edit')->name('colores_producto.edit');
    Route::post('update', 'ColoresProductoController@update')->name('colores_producto.update');
});

//Clientes
Route::prefix('clientes')->group(function () {
    Route::get('/', 'ClientesController@index')->name('clientes.index');
    Route::post('deshabilitar', 'ClientesController@deshabilitar')->name('clientes.deshabilitar');
});

//Ventas
Route::prefix('ventas')->group(function () {
    Route::get('/', 'VentasController@index')->name('ventas.index');
    Route::get('listar_ventas', 'VentasController@listar_ventas')->name('ventas.listar_ventas');
    Route::post('liquidar', 'VentasController@liquidar')->name('ventas.liquidar');
    Route::post('cancelar', 'VentasController@cancelar')->name('ventas.cancelar');
    Route::post('modificarPrecios', 'VentasController@modificar_precios')->name('ventas.modificar_precios');
});

//Configuracion
Route::prefix('configuracion')->group(function () {
    Route::get('/', 'ConfiguracionController@index')->name('configuracion.index');
    Route::post('store', 'ConfiguracionController@store')->name('configuracion.store');
    Route::post('storeGuia', 'ConfiguracionController@storeGuia')->name('configuracion.storeGuia');
});


//Precio por Mayor
Route::prefix('precios_por_mayor')->group(function () {
    Route::get('{id}/create', 'PrecioPorMayorController@create')->name('precios_por_mayor.create');
    Route::post('store', 'PrecioPorMayorController@store')->name('precios_por_mayor.store');
    Route::get('{id}/edit', 'PrecioPorMayorController@edit')->name('precios_por_mayor.edit');
    Route::post('update', 'PrecioPorMayorController@update')->name('precios_por_mayor.update');
    Route::post('delete', 'PrecioPorMayorController@delete')->name('precios_por_mayor.delete');
});


//Departamentos
Route::prefix('departamentos')->group(function () {
    Route::get('create', 'DepartamentoController@create')->name('departamentos.create');
    Route::post('store', 'DepartamentoController@store')->name('departamentos.store');
    Route::get('{id}/edit', 'DepartamentoController@edit')->name('departamentos.edit');
    Route::post('update', 'DepartamentoController@update')->name('departamentos.update');
    Route::post('delete', 'DepartamentoController@delete')->name('departamentos.delete');
});

//ProvinciaDistrito
Route::prefix('provincia_distrito')->group(function () {
    Route::get('{id}/create', 'ProvinciasDistritosController@create')->name('provincia_distrito.create');
    Route::post('store', 'ProvinciasDistritosController@store')->name('provincia_distrito.store');
    Route::get('{id}/edit', 'ProvinciasDistritosController@edit')->name('provincia_distrito.edit');
    Route::post('update', 'ProvinciasDistritosController@update')->name('provincia_distrito.update');
    Route::post('delete', 'ProvinciasDistritosController@delete')->name('provincia_distrito.delete');
});

//Metodos de Pago
Route::prefix('metodos_de_pago')->group(function () {
    Route::get('create', 'MetodosDePagoController@create')->name('metodos_de_pago.create');
    Route::post('store', 'MetodosDePagoController@store')->name('metodos_de_pago.store');
    Route::get('{id}/edit', 'MetodosDePagoController@edit')->name('metodos_de_pago.edit');
    Route::post('update', 'MetodosDePagoController@update')->name('metodos_de_pago.update');
    Route::post('delete', 'MetodosDePagoController@delete')->name('metodos_de_pago.delete');
});
