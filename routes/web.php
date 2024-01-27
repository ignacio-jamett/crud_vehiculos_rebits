<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuariosController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('usuarios', 'App\Http\Controllers\UsuariosController')->middleware('auth');
Route::resource('vehiculos', 'App\Http\Controllers\VehiculosController')->middleware('auth');
Route::resource('historicos', 'App\Http\Controllers\HistoricosController')->middleware('auth');

Auth::routes(['reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
