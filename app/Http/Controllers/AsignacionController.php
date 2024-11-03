<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Usuario;
use App\Models\Tienda;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function index()
    {
        $asignaciones = Asignacion::with(['usuario', 'tienda'])->get();
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $tiendas = Tienda::all();
        return view('asignaciones.create', compact('usuarios', 'tiendas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tienda_id' => 'required|exists:tiendas,id',
        ]);

        Asignacion::create($validatedData);

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación creada exitosamente.');
    }

    public function show(Asignacion $asignacion)
    {
        $asignacion->load(['usuario', 'tienda']);
        return view('asignaciones.show', compact('asignacion'));
    }

    public function edit(Asignacion $asignacion)
    {
        $usuarios = Usuario::all();
        $tiendas = Tienda::all();
        return view('asignaciones.edit', compact('asignacion', 'usuarios', 'tiendas'));
    }

    public function update(Request $request, Asignacion $asignacion)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tienda_id' => 'required|exists:tiendas,id',
        ]);

        $asignacion->update($validatedData);

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy(Asignacion $asignacion)
    {
        $asignacion->delete();

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación eliminada exitosamente.');
    }
}
