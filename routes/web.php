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
use App\Http\Controllers\ApiSampleController;

Route::get('/', [AutorController::class, 'index']);

Route::resource('/autores', AutorController::class);
Route::get('/autores/{codigo}/confirmDelete', [AutorController::class, 'confirmDelete']);

Route::resource('/libros', LibroController::class);
Route::get('/libros/{codigo}/confirmDelete', [LibroController::class, 'confirmDelete']);

Route::post('/api/v1/comments', [ApiSampleController::class,'create']);
Route::get('/api/v1/comments', [ApiSampleController::class,'get']);
Route::get('/api/v1/comments/{id}', [ApiSampleController::class,'getById']);
Route::put('/api/v1/comments/{id}', [ApiSampleController::class,'update']);
Route::patch('/api/v1/comments/{id}', [ApiSampleController::class,'patch']);
Route::delete('/api/v1/comments/{id}', [ApiSampleController::class,'delete']);
