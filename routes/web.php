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

//Routing - routing di laravel

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function () {
    $web = "Saya Adl; Fathi";
    return view('profile', compact('web'));
});

Route::get('about', function () {
    return 'ini adalah halaman about';
});

//not working
Route::get('halomet', 'TestingController@halomet') ;

//not working
Route::get('halaman/{page }', function ($page) {
    return 'ini adalah halaman  '. $page;
});
