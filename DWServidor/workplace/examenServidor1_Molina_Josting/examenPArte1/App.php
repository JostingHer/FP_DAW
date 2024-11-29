<?php
class App
{


    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'arrays';
        }
        $this->$method();
    }


    public function arrays()
    {
        include("views/arrays.php");
    }

    public function cookies()
    {
        include("views/cookies.php");
    }

    public function ficheros()
    {
        include("views/ficheros.php");
    }


    public function addProduct()
    {
        session_start();

        if (!empty($_POST['name'])) {
            $product = $_POST['name'];

            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
            $products[] = $product;

            setcookie("products", json_encode($products), time() + 3600, "/");
            header('Location: ?method=cookies');
            exit;
        }
    }

    public function showProducts()
    {
        session_start();
        $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
        include("views/cookies.php");
    }


    public function anyadirProducto()
    {

        $file = fopen("lista.txt", "a");

        if ($file) {
            fwrite($file, strtoupper($_POST['producto']) . "<br>");
        }
        fclose($file);

        include("views/ficheros.php");
    }

    public function mostrarProductos()
    {

        $file = fopen("lista.txt", "r");

        if ($file) {
            $content = fread($file, filesize("lista.txt"));
        }
        fclose($file);

        include("views/ficheros.php");
        echo $content;
    }
}
