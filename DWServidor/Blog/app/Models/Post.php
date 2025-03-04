<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    private $id;
    private $titulo;
    private $contenido;
    private $autor;
    private $fecha;

    // protected $fillable = ['titulo', 'contenido', 'autor', 'fecha'];
    // public $timestamps = false;
}
