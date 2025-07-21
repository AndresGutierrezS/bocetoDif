<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('login');
});

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');

Route::get('/visualizar', function () {
    return view('visualizar');
})->name('visualizar');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');



//Login

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Registro




Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth')->name('inicio');