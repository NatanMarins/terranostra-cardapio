<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaPerfilController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');


// Recuperar Senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot-password.show');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forgot-password.submit');
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'submitResetPassword'])->name('password.reset');


// Cardápio para cliente
Route::get('/cardapio', [DashboardController::class, 'index'])->name('dashboard.dashboard');


//Route::group(['middleware' => ['auth', 'empresa']], function ()

// Middleware
Route::group(['middleware' => 'auth'], function () {

    // Perfil
    Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/update-profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');


    // Perfil Empresa
    Route::get('/show-profile-empresa', [EmpresaPerfilController::class, 'show'])->name('empresa_profile.show');
    Route::get('/edit-profile-empresa', [EmpresaPerfilController::class, 'edit'])->name('empresa_profile.edit');
    Route::put('/update-profile-empresa', [EmpresaPerfilController::class, 'update'])->name('empresa_profile.update');


    // Usuário
    Route::get('/index-usuario', [UsuarioController::class, 'index'])->name('usuario.index')->middleware('permission:index-usuario');
    Route::get('/show-usuario/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show')->middleware('permission:index-usuario');
    Route::get('/create-usuario', [UsuarioController::class, 'create'])->name('usuario.create')->middleware('permission:index-usuario');
    Route::post('/store-usuario', [UsuarioController::class, 'store'])->name('usuario.store')->middleware('permission:index-usuario');
    Route::get('/edit-usuario/{usuario}', [UsuarioController::class, 'edit'])->name('usuario.edit')->middleware('permission:index-usuario');
    Route::put('/update-usuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update')->middleware('permission:index-usuario');
    Route::get('/edit-usuario-password/{usuario}', [UsuarioController::class, 'editPassword'])->name('usuario.edit-password')->middleware('permission:index-usuario');
    Route::put('/update-usuario-password/{usuario}', [UsuarioController::class, 'updatePassword'])->name('usuario.update-password')->middleware('permission:index-usuario');
    Route::delete('/destroy-usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy')->middleware('permission:index-usuario');


    // Empresa
    Route::get('/index-empresa', [EmpresaController::class, 'index'])->name('empresa.index')->middleware('permission:index-empresa');
    Route::get('/show-empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show')->middleware('permission:index-empresa');
    Route::get('/create-empresa', [EmpresaController::class, 'create'])->name('empresa.create')->middleware('permission:index-empresa');
    Route::post('/store-empresa', [EmpresaController::class, 'store'])->name('empresa.store')->middleware('permission:index-empresa');
    Route::get('/edit-empresa/{empresa}', [EmpresaController::class, 'edit'])->name('empresa.edit')->middleware('permission:index-empresa');
    Route::put('/update-empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresa.update')->middleware('permission:index-empresa');
    Route::delete('/destroy-empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresa.destroy')->middleware('permission:index-empresa');



    // Cardápio
    Route::get('/index-cardapio', [MenuController::class, 'index'])->name('menu.index')->middleware('permission:index-cardapio');
    Route::get('/show-cardapio/{menu}', [MenuController::class, 'show'])->name('menu.show')->middleware('permission:show-cardapio');
    Route::get('/create-cardapio', [MenuController::class, 'create'])->name('menu.create')->middleware('permission:create-cardapio');
    Route::post('/store-cardapio', [MenuController::class, 'store'])->name('menu.store')->middleware('permission:create-cardapio');
    Route::get('/edit-cardapio/{menu}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('permission:edit-cardapio');
    Route::put('/update-cardapio/{menu}', [MenuController::class, 'update'])->name('menu.update')->middleware('permission:edit-cardapio');
    Route::delete('/destroy-cardapio/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('permission:destroy-cardapio');


    // Categoria
    Route::get('/index-categoria', [CategoriaController::class, 'index'])->name('categoria.index')->middleware('permission:index-categoria');
    Route::get('/show-categoria/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show')->middleware('permission:show-categoria');
    Route::get('/create-categoria', [CategoriaController::class, 'create'])->name('categoria.create')->middleware('permission:create-categoria');
    Route::post('/store-categoria', [CategoriaController::class, 'store'])->name('categoria.store')->middleware('permission:create-categoria');
    Route::get('/edit-categoria/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit')->middleware('permission:edit-categoria');
    Route::put('/update-categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update')->middleware('permission:edit-categoria');
    Route::delete('/destroy-categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('permission:destroy-categoria');
});
