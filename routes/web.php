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

Route::get('/','IndexController@index');
Route::get('/listaproducto','IndexController@shop');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/detalleprod/{id}','IndexController@detialpro');

Route::get( 'cart/add/{product_id}', 'CartController@add' )->name('cart.add');
Route::get( 'cart/', 'CartController@index' );
Route::get( 'cart/show', 'CartController@show' )->name('cart.show');
Route::get('/cart/destroy/{id}','CartController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::Resource('productos', 'ProductosController');
Route::Resource('categoria', 'CategoriaController');
Route::resource('/image-gallery','ImagenController');
