<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'tienda_id',
        'codigo_interno',
        'codigo_fabricante',
        'codigo_oem',
        'origen',
        'marca',
        'descripcion',
        'multiplos',
        'medida',
        'stock',
        'precio_compra',
        'precio_venta',
        'precio_minimo',
    ];

    protected $casts = [
        'stock' => 'integer',
        'precio_compra' => 'decimal:2',
        'precio_venta' => 'decimal:2',
        'precio_minimo' => 'decimal:2',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'codigo_interno', 'codigo_interno');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'codigo_interno', 'codigo_interno');
    }

    public function reemplazos()
    {
        return $this->hasMany(Reemplazo::class, 'codigo_producto', 'codigo_interno');
    }

    public function aplicaciones()
    {
        return $this->hasMany(Aplicacion::class, 'codigo_producto', 'codigo_interno');
    }

    public function reducciones()
    {
        return $this->hasMany(Reduccion::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'codigo_interno', 'codigo_interno');
    }

    public function traspasos()
    {
        return $this->hasMany(Traspaso::class);
    }

    public function catalogo()
    {
        return $this->hasOne(Catalogo::class, 'codigo_interno', 'codigo_interno');
    }
}
