<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Campos asignables en massa
    protected $fillable = ['name', 'description', 'price', 'stock'];

    // Conversión automática de tipos de datos
    protected $casts = [
        'price' => 'decimal:2',
    ];
}
