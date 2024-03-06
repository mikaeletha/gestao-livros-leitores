<?php

use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LivroLeitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// LEITOR
Route::get('/leitor', [LeitorController::class, 'index']);
Route::get('/leitor/{id}', [LeitorController::class, 'show']);
Route::post('/leitor', [LeitorController::class, 'store']);
Route::put('/leitor/{id}', [LeitorController::class, 'update']);
Route::delete('/leitor/{id}', [LeitorController::class, 'destroy']);
// LIVRO
Route::get('/livro', [LivroController::class, 'index']);
Route::get('/livro/{id}', [LivroController::class, 'show']);
Route::post('/livro', [LivroController::class, 'store']);
// Route::put('/livro/{id}', [LivroController::class, 'update']);
Route::put('/livro/{leitorId}/{livroId}', [LivroController::class, 'update']);
Route::delete('/livro/{id}', [LivroController::class, 'destroy']);
// RELAÇÃO LIVRO LEITO
Route::get('/livro-leitor', [LivroLeitorController::class, 'index']);
Route::get('/livro-leitor/{leitorId}', [LivroLeitorController::class, 'show']);