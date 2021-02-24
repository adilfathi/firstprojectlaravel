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
Route::get('/pegawai','PegawaiController@index');

Route::post('/pegawai/store','PegawaiController@store');

Route::get('/pegawai/edit/{id}','PegawaiController@edit');

Route::post('/pegawai/update','PegawaiController@update');

Route::get('/pegawai/hapus/{id}','PegawaiController@hapus');

//CRUD TABLE ADMIN
Route::get('/admin','AdminController@index');

Route::post('/admin/store','AdminController@store');

Route::get('/admin/edit/{id}','AdminController@edit');

Route::post('/admin/update','AdminController@update');

Route::get('/admin/hapus/{id}','AdminController@hapus');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// TES NGEPUSH KE REPOSITORY

// NGETES PUSH 
