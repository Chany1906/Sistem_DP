<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TiendaController extends Controller
{
    public function index()
    {
        $tiendas = Tienda::all();
        return view('tiendas.index', compact('tiendas'));
    }

    public function create()
    {
        return view('tiendas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ruc' => 'required|string|max:20|unique:tiendas',
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        Tienda::create($validatedData);

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda creada exitosamente.');
    }

    public function show(Tienda $tienda)
    {
        return view('tiendas.show', compact('tienda'));
    }

    public function edit(Tienda $tienda)
    {
        return view('tiendas.edit', compact('tienda'));
    }

    public function update(Request $request, Tienda $tienda)
    {
        $validatedData = $request->validate([
            'ruc' => [
                'required',
                'string',
                'max:20',
                Rule::unique('tiendas')->ignore($tienda->id),
            ],
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        $tienda->update($validatedData);

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda actualizada exitosamente.');
    }

    public function destroy(Tienda $tienda)
    {
        $tienda->delete();

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda eliminada exitosamente.');
    }
}
