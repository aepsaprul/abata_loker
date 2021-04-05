<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::put('/home/persyaratan/update', [HomeController::class, 'persyaratanUpdate'])->name('home.persyaratan.update');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client');
    Route::put('/client/persyaratan/update', [ClientController::class, 'persyaratanUpdate'])->name('client.persyaratan.update');
});
