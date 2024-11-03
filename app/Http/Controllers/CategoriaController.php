<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'campo_medicion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('categorias', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        Categoria::create($validatedData);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'campo_medicion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($categoria->imagen) {
                Storage::disk('public')->delete($categoria->imagen);
            }
            $imagePath = $request->file('imagen')->store('categorias', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        $categoria->update($validatedData);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        // Eliminar la imagen asociada si existe
        if ($categoria->imagen) {
            Storage::disk('public')->delete($categoria->imagen);
        }

        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }
}
