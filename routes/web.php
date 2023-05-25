<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Inicio Rotas Clientes

    // // Listar todos os clientes
    Route::get('/clientes', [ClienteController::class, 'index']);

    // Exibir formulário para criar um novo cliente
    Route::get('/clientes/criar', [ClienteController::class, 'create']);

    // Salvar novo cliente no banco de dados
    Route::post('/clientes', [ClienteController::class, 'store']);

    // Exibir informações de um cliente específico
    Route::get('/clientes/detalhar/{id}', [ClienteController::class, 'show']);

    // Exibir formulário para editar um cliente
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit']);

    // // Atualizar dados de um cliente no banco de dados
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);

    // Excluir um cliente do banco de dados
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

      // Fim Rotas Clientes

      
    // Inicio Rotas Compras

    // // Listar todos os clientes
    Route::get('/compras', [CompraController::class, 'index']);

    // Exibir formulário para criar um novo cliente
    Route::get('/compras/criar', [CompraController::class, 'create']);

    // Salvar novo cliente no banco de dados
    Route::post('/compras', [CompraController::class, 'store']);

    // Exibir informações de um cliente específico
    Route::get('/compras/detalhar/{id}', [CompraController::class, 'show']);

    // Exibir formulário para editar um cliente
    Route::get('/compras/edit/{id}', [CompraController::class, 'edit']);

    // // Atualizar dados de um cliente no banco de dados
    Route::put('/compras/{id}', [CompraController::class, 'update']);

    // Excluir um cliente do banco de dados
    Route::delete('/compras/{id}', [CompraController::class, 'destroy']);

      // Fim Rotas Compras



});



