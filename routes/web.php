<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

//Routing - routing di laravel

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

//CRUD TABLE KARRYAWAN
// Route::resource('/pegawai', App\Http\Controllers\PegawaiController::class);
Route::get('/pegawai','App\Http\Controllers\PegawaiController@index')->name('pegawai');
Route::get('/pegawai/create','App\Http\Controllers\PegawaiController@create');
Route::get('/pegawai/{pegawai}','App\Http\Controllers\PegawaiController@show');
Route::post('/pegawai','App\Http\Controllers\PegawaiController@store');
ROute::delete('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@hapus');
Route::get('/pegawai/{pegawai}/edit','App\Http\Controllers\PegawaiController@edit');
Route::patch('/pegawai/{pegawai}','App\Http\Controllers\PegawaiController@update');

//CRUD TABLE ADMIN
Route::get('/admin','AdminController@index');
Route::post('/admin/store','AdminController@store');
Route::get('/admin/edit/{id}','AdminController@edit');
Route::post('/admin/update','AdminController@update');
Route::get('/admin/hapus/{id}','AdminController@hapus');

//CRUD TABLE DIVISI
Route::get('/divisi', 'App\Http\Controllers\DivisiController@index')->name('divisi');
Route::get('/divisi/create', 'App\Http\Controllers\DivisiController@create');
Route::get('/divisi/{divisi}','App\Http\Controllers\DivisiController@show');
Route::post('/divisi', 'App\Http\Controllers\DivisiController@store');
Route::delete('/divisi/{divisi}', 'App\Http\Controllers\DivisiController@destroy');
Route::get('/divisi/{divisi}/edit', 'App\Http\Controllers\DivisiController@edit');
Route::patch('/divisi/{divisi}', 'App\Http\Controllers\DivisiController@update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// TES NGEPUSH KE REPOSITORY

// NGETES PUSH
