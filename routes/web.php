<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');


// Usuário
Route::get('/index-usuario', [UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/show-usuario/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/create-usuario', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/store-usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/edit-usuario/{usuario}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/update-usuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::get('/edit-usuario-password/{usuario}', [UsuarioController::class, 'editPassword'])->name('usuario.edit-password');
Route::put('/update-usuario-password/{usuario}', [UsuarioController::class, 'updatePassword'])->name('usuario.update-password');
Route::delete('/destroy-usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');


// Empresa
Route::get('/index-empresa', [EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/show-empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show');
Route::get('/create-empresa', [EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/store-empresa', [EmpresaController::class, 'store'])->name('empresa.store');
Route::get('/edit-empresa/{empresa}', [EmpresaController::class, 'edit'])->name('empresa.edit');
Route::put('/update-empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresa.update');
Route::delete('/destroy-empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');



// Cardápio
Route::get('/index-cardapio', [MenuController::class, 'index'])->name('menu.index');
Route::get('/show-cardapio/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/create-cardapio', [MenuController::class, 'create'])->name('menu.create');
Route::post('/store-cardapio', [MenuController::class, 'store'])->name('menu.store');
Route::get('/edit-cardapio/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/update-cardapio/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/destroy-cardapio/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');


// Categoria
Route::get('/index-categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/show-categoria/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::get('/create-categoria', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/store-categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/edit-categoria/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/update-categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/destroy-categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
