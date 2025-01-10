<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indice(){
        return view('welcome');
    }
    public function saludo(){
        return view('holauser');
    }
    public function saludoPersona($name, $rol = null){
        return view('holauser', ['name' => $name , 'rol' => $rol]);
    }
    public function saludoPersonaBlade($name, $rol = null){
        return view('holauser2', ['name' => $name , 'rol' => $rol]);
    }
    public function saludandoPersonas(){


        $array = ['julio', 'jos', 'pepe', 'juan', 'katy'];

        return view('holaUsersList', ['userNames' => $array]);
    }
    
}
 