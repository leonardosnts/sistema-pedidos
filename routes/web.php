<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ROUTES AUTH
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/singin', [AuthController::class, 'singin'])->name('singin');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function(){

    // ROUTES HOME
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ROUTES CLIENTS
    Route::get('/clientes', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clientes/cadastro', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clientes/cadastro', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clientes/editar/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clientes/editar/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clientes/excluir/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // ROUTES PRODUCTS
    Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produtos/cadastro', [ProductController::class, 'create'])->name('products.create');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/produtos/cadastro', [ProductController::class, 'store'])->name('products.store');
    Route::get('produtos/editar/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('produtos/editar/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('produtos/excluir/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // ROUTES PURCHASE
    Route::get('/pedidos', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/pedidos/cadastro', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::get('/pedidos/{id}', [PurchaseController::class, 'show'])->name('purchases.show');
    Route::post('/pedidos/cadastro', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('pedidos/editar/{id}', [PurchaseController::class, 'edit'])->name('purchases.edit');
    Route::put('pedidos/editar/{id}', [PurchaseController::class, 'update'])->name('purchases.update');
    Route::delete('pedidos/excluir/{id}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');
    
});