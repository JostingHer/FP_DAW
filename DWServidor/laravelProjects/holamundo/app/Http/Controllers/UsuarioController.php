<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function allData(){

        $usuarios = Usuario::all();

        return view('allUsersView', ['data' => $usuarios] );
    }
}
