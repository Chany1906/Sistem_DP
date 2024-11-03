<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_interno',
        'imagen'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'codigo_interno', 'codigo_interno');
    }
}
