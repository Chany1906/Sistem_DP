<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario' => 'required|string|max:255|unique:usuarios',
            'rol' => 'required|string|in:admin,usuario,vendedor',
            'estado' => 'required|string|in:activo,inactivo',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Usuario::create($validatedData);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate([
            'usuario' => [
                'required',
                'string',
                'max:255',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
            'rol' => 'required|string|in:admin,usuario,vendedor',
            'estado' => 'required|string|in:activo,inactivo',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $usuario->update($validatedData);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
