<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();

Route::group(['prefix'=> '', 'middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=> 'produtos'], function () {
        Route::get('', [ProductsController::class, 'index'])->name('products_index');
    });

    Route::group(['prefix'=> 'fornecedores'], function () {
        Route::get('', [SuppliersController::class, 'index'])->name('suppliers_index');
        Route::get('cadastro', [SuppliersController::class, 'create'])->name('suppliers_create');
        Route::post('salvar', [SuppliersController::class, 'store'])->name('supplier_store');
    });
});
