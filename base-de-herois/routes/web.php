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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/usuarios', 'UserController@index')->name('usuarios.list');
    Route::get('/usuarios2', 'UserController@index2')->name('usuarios2.list');

    Route::get('/herois', 'HeroiController@index')->name('herois.list');
    Route::get('/herois/novo', 'HeroiController@create')->name('herois.novo');
    Route::post('/herois/salva-novo', 'HeroiController@store')->name('herois.salvanovo');
});
