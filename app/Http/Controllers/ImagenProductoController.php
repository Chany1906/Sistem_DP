<?php

namespace App\Http\Controllers;

use App\Models\ImagenProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenProductoController extends Controller
{
    public function index()
    {
        $imagenes = ImagenProducto::with('producto')->get();
        return view('imagenes.index', compact('imagenes'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('imagenes.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_interno' => 'required|exists:productos,codigo_interno',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');

                ImagenProducto::create([
                    'codigo_interno' => $request->codigo_interno,
                    'imagen' => $rutaImagen
                ]);
            }

            return redirect()->route('imagenes.index')->with('success', 'Imágenes subidas exitosamente.');
        }

        return redirect()->back()->with('error', 'Error al subir las imágenes.');
    }

    public function destroy(ImagenProducto $imagen)
    {
        Storage::disk('public')->delete($imagen->imagen);
        $imagen->delete();

        return redirect()->route('imagenes.index')->with('success', 'Imagen eliminada exitosamente.');
    }
    public function destroyAll($codigoInterno)
    {
        $imagenes = ImagenProducto::where('codigo_interno', $codigoInterno)->get();

        foreach ($imagenes as $imagen) {
            Storage::disk('public')->delete($imagen->imagen);
            $imagen->delete();
        }

        return redirect()->route('imagenes.index')
            ->with('success', 'Todas las imágenes del producto han sido eliminadas exitosamente.');
    }
}
