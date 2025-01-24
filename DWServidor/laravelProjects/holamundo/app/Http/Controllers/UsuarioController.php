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
    public function store(Request $request){

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->edad = $request->edad;
        $usuario->save();

        return redirect()->route('AS_usuarios');
    }

    public function addUserView() {
        return view('addUser');
    }

}
