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

Route::get('/', function () {
    echo "api ppk ormawa fkep 2022";
    // return view('welcome');
});

Route::get('/must_login', function () {
    echo "Login terlebih dahulu";
    // return view('welcome');
})->name('must_login');