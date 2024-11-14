
<?php

require_once 'models/Escritor.php';
require_once 'models/Libro.php';
require_once 'models/Tool.php';


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
        $escritores = Tool::obtenerTodos();

        include("views/home.php");
    }

    public function obtenerLibros()
    {
        $nombreAutor = $_POST['nombreAutor'];
        $libros = Libro::consulta1($nombreAutor);

        include("views/home.php");
        var_dump($nombreAutor);
    }
}
