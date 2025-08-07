<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\AuthController; // Use o AuthController que você renomeou

// ROTAS DE CADASTRO
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

// ROTAS DE LOGIN PERSONALIZADAS
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROTA PARA ÁREA DO USUÁRIO (protegida por autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/area-usuario', function () {
        return view('area_usuario');
    })->name('area.usuario');

    // Mantenha apenas uma rota para a área do usuário.
    // O que antes era Route::get('/area') agora é a rota 'area.usuario'.
    Route::get('/area', function () {
        return redirect()->route('area.usuario');
    })->name('area-user');
});

// ROTAS GERAIS
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/termos-de-servico', function () {
    return view('termos-de-servico');
})->name('termos');