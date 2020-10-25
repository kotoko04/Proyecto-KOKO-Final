<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'WelcomeController@index')->name('welcomeI');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/producto/agregar', 'ProductoController@viewProducto')->name('producto');
Route::get('/producto/lista', 'ProductoController@viewProductoLista')->name('productoLista');
Route::get('/categoria/agregar', 'CategoriaController@viewCategoria')->name('categoria');
Route::get('/marca/agregar', 'MarcaController@viewMarca')->name('marca');
Route::get('/empresa/agregar', 'EmpresaController@viewEmpresa')->name('empresa');
Route::get('/producto/total', 'WelcomeController@viewlistProductoOrden')->name('welcomeTotal');


Route::post('/correo', 'MailController@getMail')->name('email');
Route::post('/categoria/agregar', 'CategoriaController@addCategoria')->name('categoria');
Route::post('/marca/agregar', 'MarcaController@addMarca')->name('marca');
Route::post('/empresa/agregar', 'EmpresaController@updateEmpresa')->name('empresa');
Route::post('/producto/agregar', 'ProductoController@addProducto')->name('producto');
Route::post('/producto/eliminar', 'ProductoController@deleteProducto')->name('productoEliminar');
Route::post('/producto/vieweditar/{id}', 'ProductoController@viewEditProducto')->name('productoviewEditar');
Route::post('/producto/editar', 'ProductoController@editProducto')->name('productoEditar');
Route::post('/producto/filtro', 'WelcomeController@listProducto')->name('welcome');
Route::post('/producto/total/{idC}/{idM}', 'WelcomeController@listProductoOrden')->name('welcomeTotalA');
Route::post('/producto/buscar', 'WelcomeController@buscarProducto')->name('welcomeBuscar');
