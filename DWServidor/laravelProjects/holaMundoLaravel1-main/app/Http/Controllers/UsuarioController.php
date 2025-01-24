<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsuarioRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
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

        $usuarios = Usuario::paginate(5);

        return view('indiceUsuarios', ['usuarios' => $usuarios]);
    }

    public function nuevoUsuario(){

        return view('nuevoUsuario');

    }

    public function add(AddUsuarioRequest $request){

        /*
        $request->validate([
            'nombre' => 'required|string|max:100|unique:usuarios' ,
            'email' => 'required|email|max:255' ,
            'edad' => 'required|integer|min:1|max:150'
        ]);
        */

        $nuevoUsuario = new Usuario;
        $nuevoUsuario->nombre =  $request -> nombre;
        $nuevoUsuario->email =  $request -> email;
        $nuevoUsuario->edad =  $request -> edad;

        $nuevoUsuario->save();

        return redirect()->route('rutaIndiceUsuario');
    }

    public function actualizarUsuario($id){

        return view('actualizarUsuario', ["id"=>$id]);

    }

    public function update(Request $request){

        $usuario = Usuario::find($request->id);
        $usuario->nombre =  $request -> nombre;
        $usuario->email =  $request -> email;
        $usuario->edad =  $request -> edad;

        $usuario->save();

        return redirect()->route('rutaIndiceUsuario');
    }

    public function delete($id){

        $usuario = Usuario::find($id);
        $usuario->delete();

        return redirect()->route('rutaIndiceUsuario');
    }


}
