<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entrada_Controller;
use App\Http\Controllers\Saida_Controller;
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
Route::delete('/entrada/id/{id}', [Entrada_Controller::class, 'remove']);

Route::get('/saida', [Saida_Controller::class, 'show']);
Route::post('/saida', [Saida_Controller::class, 'salvar']);
Route::get('/saida/id/{id}/tipo/{tipo}', [Saida_Controller::class, 'show'])->name('saida.show');
Route::delete('/saida/id/{id}', [Saida_Controller::class, 'remove']);


