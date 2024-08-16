<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cardápio
Route::get('/index-cardapio', [MenuController::class, 'index'])->name('menu.index');
Route::get('/show-cardapio/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/create-cardapio', [MenuController::class, 'create'])->name('menu.create');
Route::post('/store-cardapio', [MenuController::class, 'store'])->name('menu.store');
Route::get('/edit-cardapio/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/update-cardapio/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/destroy-cardapio/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

