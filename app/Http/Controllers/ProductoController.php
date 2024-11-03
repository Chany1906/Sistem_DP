<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductosImport;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Producto::with(['categoria', 'tienda']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('codigo_interno', 'LIKE', "%{$search}%")
                    ->orWhere('codigo_fabricante', 'LIKE', "%{$search}%")
                    ->orWhere('codigo_oem', 'LIKE', "%{$search}%")
                    ->orWhere('marca', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->orWhereHas('categoria', function ($q) use ($search) {
                        $q->where('nombre', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('tienda', function ($q) use ($search) {
                        $q->where('razon_social', 'LIKE', "%{$search}%");
                    });
            });
        }

        $productos = $query->get(); // Cambiamos paginate() por get() para obtener todos los productos

        if ($request->ajax()) {
            return response()->json([
                'productos' => view('productos.partials.producto_row', compact('productos'))->render(),
                'total' => $productos->count()
            ]);
        }

        return view('productos.index', compact('productos'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        $tiendas = Tienda::all();
        return view('productos.create', compact('categorias', 'tiendas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'tienda_id' => 'required|exists:tiendas,id',
            'codigo_interno' => 'required|unique:productos',
            'codigo_fabricante' => 'nullable',
            'codigo_oem' => 'nullable',
            'origen' => 'nullable',
            'marca' => 'nullable',
            'descripcion' => 'nullable',
            'multiplos' => 'nullable',
            'medida' => 'nullable',
            'stock' => 'nullable|integer',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
            'precio_minimo' => 'nullable|numeric',
        ]);

        Producto::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $tiendas = Tienda::all();
        return view('productos.edit', compact('producto', 'categorias', 'tiendas'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validatedData = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'tienda_id' => 'required|exists:tiendas,id',
            'codigo_interno' => 'required|unique:productos,codigo_interno,' . $producto->id,
            'codigo_fabricante' => 'nullable',
            'codigo_oem' => 'nullable',
            'origen' => 'nullable',
            'marca' => 'nullable',
            'descripcion' => 'nullable',
            'multiplos' => 'nullable',
            'medida' => 'nullable',
            'stock' => 'nullable|integer',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
            'precio_minimo' => 'nullable|numeric',
        ]);

        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ProductosImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Productos importados exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al importar productos: ' . $e->getMessage());
        }
    }
}
