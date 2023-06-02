<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;

Route::get('/', [HomeController::class, 'index']);

Route::resource('/autores', AutorController::class);
Route::get('/autores/{codigo}/confirmDelete', [AutorController::class, 'confirmDelete']);

Route::resource('/libros', LibroController::class);
Route::get('/libros/{codigo}/confirmDelete', [LibroController::class, 'confirmDelete']);


