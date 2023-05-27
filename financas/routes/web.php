<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entrada_Controller;
use App\Http\Controllers\Index_Controller;

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
Route::get('/', [Index_Controller::class, 'index']);
Route::get('/entrada', [Entrada_Controller::class, 'show']);
Route::get('/entrada/id/{id}/tipo/{tipo}', [Entrada_Controller::class, 'show'])->name('entrada.show');
Route::post('/entrada', [Entrada_Controller::class, 'salvar']);

