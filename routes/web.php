<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\VisualizarController;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Route::get('/inicio', function () {
//     return view('inicio');
// })->name('inicio');

Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario.index');
Route::post('/formulario', [FormularioController::class, 'store'])->name('formulario.post');
Route::get('/formulario/{menor}/edit', [FormularioController::class, 'edit'])->name('formulario.edit');
Route::put('/formulario/{menor}', [FormularioController::class, 'update'])->name('formulario.update');
Route::delete('formulario/{menor}', [FormularioController::class, 'destroy'])->name('formulario.destroy');
Route::get('/formulario/{menor}/visualizar', [FormularioController::class, 'show'])->name('formulario.show');

// Route::get('/formulario', function () {
//     return view('formulario');
// })->name('formulario');


// Route::get('/inicio', function () {
//     return view('inicio');
// })->middleware('auth');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');



//Login

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Registro




Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

// Route::get('/inicio', function () {
//     return view('inicio');
// })->middleware('auth')->name('inicio');