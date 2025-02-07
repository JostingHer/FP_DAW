<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'creditCard']; // Permitir asignación masiva

    protected $hidden = ['creditCard']; // Ocultar en respuestas JSON

    protected $casts = [
        'creditCard' => 'encrypted', // Cifrar la tarjeta automáticamente
    ];
}
