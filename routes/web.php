<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $totalEquipos = \App\Models\Equipo::count();
    $totalJugadores = \App\Models\Jugador::count();
    $totalPartidos = \App\Models\Partido::count();

    $ultimosPartidos = \App\Models\Partido::with(['equipoLocal', 'equipoVisitante'])
        ->where('estado', 'Finalizado')
        ->orderBy('fecha', 'desc')
        ->take(5)
        ->get();

    return view('dashboard', compact('totalEquipos', 'totalJugadores', 'totalPartidos', 'ultimosPartidos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('equipos', EquipoController::class)->middleware('auth');
Route::resource('jugadores', JugadorController::class)->middleware('auth')->parameters(['jugadores' => 'jugador']);
Route::resource('partidos', PartidoController::class)->middleware('auth');
Route::get('/estadisticas', [PartidoController::class, 'estadisticas'])->middleware('auth')->name('estadisticas');

require __DIR__.'/auth.php';