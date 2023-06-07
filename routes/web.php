<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Sistema\AuthController;
use App\Http\Controllers\Sistema\UsuariosController;
use App\Http\Controllers\Sistema\ClientesController;
use App\Http\Controllers\Sistema\ProdutosController;

/* Login */

Route::group(['prefix' => '/', 'namespace' => 'Sistema'], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AuthController::class, 'redirect'])->name('/');
});

/* Rotas do Sistema */
Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    /* Pagina Inicial */
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    /* CRUD do sistema */
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('clientes', ClientesController::class);
    Route::resource('produtos', ProdutosController::class);

    /* Muda Apenas o Password do usuario */
    Route::put('usuarios/changePassword/{id}', [UsuariosController::class, 'changePassword'])->name('usuarios.changePassword');


    /* Deletar Multiplos Dados */
    Route::get('usuarios/multi-delete', [UsuariosController::class, 'multiDelete'])->name('usuarios.multi-delete');
    Route::get('clientes/multi-delete', [ClientesController::class, 'multiDelete'])->name('clientes.multi-delete');
});
