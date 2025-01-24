<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;


class pedidoController extends Controller
{
    /*
    public function indice(){
        return view('welcome');
    }

    public function saludo(){
        return view('holaMundo');
    }

    public function saludoPersona($persona, $rol = null){
        return view('saludoPersona', ['varPersona' => $persona, 'varRol' => $rol]);
    }

    public function saludoTodasPersonas(){
        $array = ['raul', 'marulete', 'anton', 'leonel'];

        return view('saludoTodasLasPersonas', ['personas' => $array]);
    }
    */

    public function indice(){

        $pedidos = pedido::all();

        return view('indicePedidos', ['pedidos' => $pedidos]);
    }
}
