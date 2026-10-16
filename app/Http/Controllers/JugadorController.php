<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')->get();
        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'numero' => 'nullable|integer|min:0|max:99',
            'posicion' => 'nullable|string|max:50',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        Jugador::create($request->all());

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador creado correctamente.');
    }

    public function show(Jugador $jugador)
    {
        $jugador->load('equipo');
        return view('jugadores.show', compact('jugador'));
    }

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::all();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'numero' => 'nullable|integer|min:0|max:99',
            'posicion' => 'nullable|string|max:50',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        $jugador->update($request->all());

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador eliminado correctamente.');
    }
}