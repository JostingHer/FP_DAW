<?php
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

    public function anyadirProducto()
    {

        $file = fopen("fichero.txt", "a");

        if ($file) {
            fwrite($file, $_POST['producto'] . "<br>");

            echo "Producto escrito";
        }
        fclose($file);

        include("views/home.php");
    }

    public function mostrarProductos()
    {

        $file = fopen("fichero.txt", "r");

        if ($file) {
            $content = fread($file, filesize("fichero.txt"));
            echo $content;
        }
        fclose($file);

        include("views/home.php");
    }
}
