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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('category/wine', 'CategoryController@wine');
Route::get('category/gin', 'CategoryController@gin');
Route::get('category/whisky', 'CategoryController@whisky');
Route::get('category/rum', 'CategoryController@rum');
Route::get('category/konyak', 'CategoryController@konyak');
Route::get('product/{id}', 'ProductController@show');
Route::get('productwine/{id}', 'WineController@show');
Route::get('category/show{id}', 'CategoryController@show');
Route::post('cart/add', 'CartController@add');
Route::post('cart/clear', 'CartController@clear');
Route::post('cart/del', 'CartController@del');
Route::post('cart/edit', 'CartController@edit');
Route::post('search/goods', 'SearchController@search');
Route::post('filter/wine', 'FilterController@filterwine');
Route::post('filter/product', 'FilterController@filterProduct');

Route::post('/checkout/complete', 'ProductController@complete');
Route::get('order', 'ProductController@order');
Route::get('home/about', 'HomeController@about');


