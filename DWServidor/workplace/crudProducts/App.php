<?php

class App
{


    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
        $this->$method();
    }

    public function login()
    {
        include("views/login.php");
    }

    public function home()
    {
        include("./views/home.php");
    }

    public function auth()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {
                setcookie("name", $_POST['name'], time() + 3600 * 24);
                setcookie("password", $_POST['password'], time() + 3600 * 24);
                header('Location: ?method=home');
            } else {
                header('Location: ?method=login');
            }
        }
    }


    public function logout()
    {
        setcookie("name", "", time() - 1);
        setcookie("password", "", time() - 1);
        header('Location: ?method=login');
    }

    // added product a la lista desde el formulario
    public function addProduct()
    {
        if (!empty($_POST['name']) && !empty($_POST['stock']) && !empty($_POST['pricing'])) {
            $product = [
                'name' => $_POST['name'],
                'stock' => $_POST['stock'],
                'pricing' => $_POST['pricing'],
                'added_by' => "Profe"
            ];

            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
            $products[] = $product;

            setcookie("products", json_encode($products), time() + 3600);
            header('Location: ?method=home');
            exit;
        } else {
            header('Location: ?method=home');
            exit;
        }
    }


    public function deleteProduct()
    {
        $products = json_decode($_COOKIE['products'], true);
        unset($products[$_GET['index']]);
        $nuevosProducts = array_values($products);
        setcookie("products", json_encode($nuevosProducts), time() + 3600);
        header('Location: ?method=home');
    }

    // vaciar lista de productos

    public function clearProducts()
    {
        setcookie("products", json_encode([]), time() + 3600);
        header('Location: ?method=home');
    }






    public function empty()
    {
        setcookie("products", json_encode([]), time() + 3600);
        header('Location: ?method=home');
    }
}
