<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    private $pedidos_id;
    private $autor;
    private $contenido;
    private $fecha;

}
