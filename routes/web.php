<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\AuthController;

// ROTAS DE CADASTRO
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

// ROTAS DE LOGIN PERSONALIZADAS
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// LOGOUT (encerra sessão e redireciona para Home)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// ROTA PARA ÁREA DO USUÁRIO (protegida por autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/area-usuario', function () {
        return view('area-user');
    })->name('area.usuario');

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
