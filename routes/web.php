<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('equipos', EquipoController::class)->middleware('auth');
Route::resource('jugadores', JugadorController::class)->middleware('auth');
Route::resource('partidos', PartidoController::class)->middleware('auth');
Route::get('/estadisticas', [PartidoController::class, 'estadisticas'])->middleware('auth')->name('estadisticas');

require __DIR__.'/auth.php';