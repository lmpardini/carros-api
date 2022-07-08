<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** Rotas VeiculosController */

Route::prefix('veiculos')->controller(\App\Http\Controllers\VeiculosController::class)->group(function () {
    Route::get('/', 'listarVeiculos');
    Route::get('/find', 'buscarVeiculo');
    Route::get('/{id}', 'listarVeiculosPorId');
    Route::post('/', 'criarVeiculo');
    Route::put('/{id}', 'editarVeiculoPorId');
    Route::delete('/{id}', 'excluirVeiculoPorId');

});
