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
    return view('index');
});

Route::get('contoh/halamandua', 'Contoh@halamandua');
Route::get('contoh/halamantiga', 'Contoh@halamantiga');
Route::get('mahasiswa', 'Contoh@mahasiswa');
Route::resource('contoh', 'Contoh');