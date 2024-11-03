<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Producto([
            'categoria_id' => $row['categoria_id'],
            'tienda_id' => $row['tienda_id'],
            'codigo_interno' => $row['codigo_interno'],
            'codigo_fabricante' => $row['codigo_fabricante'] ?? null,
            'codigo_oem' => $row['codigo_oem'] ?? null,
            'origen' => $row['origen'] ?? null,
            'marca' => $row['marca'] ?? null,
            'descripcion' => $row['descripcion'] ?? null,
            'multiplos' => $row['multiplos'] ?? null,
            'medida' => $row['medida'] ?? null,
            'stock' => $row['stock'] ?? 0,
            'precio_compra' => $row['precio_compra'] ?? 0,
            'precio_venta' => $row['precio_venta'] ?? 0,
            'precio_minimo' => $row['precio_minimo'] ?? 0,
        ]);
    }
}

