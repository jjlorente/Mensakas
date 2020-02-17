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
    return view('welcome');
});
Route::resource('consumer', 'ConsumerController')->middleware('auth');
Route::resource('business', 'BusinessController')->middleware('auth');
Route::resource('mensaka', 'MensakaController')->middleware('auth');
Route::resource('order', 'OrderController')->middleware('auth');
Route::resource('product', 'ProductController')->middleware('auth');
Route::resource('pack', 'PackController')->middleware('auth');

Route::get('/mensaka/{id}/confirm','MensakaController@confirm' )->name('mensaka.confirm');
Route::get('/business/{id}/confirm','BusinessController@confirm' )->name('business.confirm');
Route::get('/consumer/{id}/confirm','ConsumerController@confirm' )->name('consumer.confirm');
Route::get('/product/{id}/confirm','ProductController@confirm' )->name('product.confirm');
Route::get('/pack/{id}/confirm','PackController@confirm' )->name('pack.confirm');
Auth::routes();
//mensaka color 5c2583
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeuser', 'HomeUserController@index')->name('homeuser');
