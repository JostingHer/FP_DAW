<?php

require_once 'models/Escritor.php';

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }


    public function home()
    {
        include("views/home.php");
    }


    public function obtenerEscritores()
    {
        //Llamas al modelo
        $escritores = Escritor::consultarTodos();


        
        //Pasas el resultado a la vista
        include("views/home.php");

    }

    //Ejemplo header
    public function logout()
    {
        header('Location: login');

    }



        
}
