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

Route::group(['middleware' => []], function () {
    Route::get('/puntos', 'Controller@index')->name('home');
    Route::get('/piloto/list', 'Controller@getPilotoList')->name('list');
    Route::get('/piloto/sumPunto/{id}', 'Controller@sumPunto')->name('sumPunto');

});

