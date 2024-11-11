
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

    public function teste()
    {
        echo "Teste";
    }
    public function obtenerEscritores()
    {
        echo "Obtener Escritores";
        $escritores = Escritor::obtenerTodos();

        include("views/home.php");
    }
}
