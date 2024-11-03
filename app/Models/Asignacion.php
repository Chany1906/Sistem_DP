<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'tienda_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
