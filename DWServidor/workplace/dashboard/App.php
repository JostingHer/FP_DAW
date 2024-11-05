<?php

class App
{
    public function run()
    {
        session_start(); // Asegúrate de que la sesión esté iniciada
        $method = isset($_GET['method']) ? $_GET['method'] : 'login';
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

    public function totalValue()
    {
        include("./views/totalValue.php");
    }

    public function searchPage()
    {
        // Verifica si el usuario está autenticado
        if (!isset($_SESSION['email'])) {
            header('Location: ?method=login');
            exit;
        }

        // Obtener productos filtrados para la página de búsqueda
        $filteredProducts = isset($_COOKIE['filtered_products']) ? json_decode($_COOKIE['filtered_products'], true) : [];
        include("./views/search.php"); // Incluir la vista de búsqueda
    }

    public function addProductPage()
    {
        include("./views/addProduct.php");
    }

    public function auth()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Obtiene usuarios desde la cookie
            $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];
            $authenticated = false;

            foreach ($users as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    $_SESSION['email'] = $email; // Guarda el email en la sesión
                    $authenticated = true;
                    break;
                }
            }

            if ($authenticated) {
                header('Location: ?method=home');
            } else {
                header('Location: ?method=login&error=1');
            }
            exit;
        }
    }







    public function registerUser()
    {
        session_start();

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];

            // Verifica si el usuario ya existe
            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    header('Location: ?method=login&error=3');
                    exit;
                }
            }

            // Agrega nuevo usuario
            $user = ['email' => $email, 'password' => $password];
            $users[] = $user;
            setcookie("users", json_encode($users), time() + 3600 * 24, "/");

            header('Location: ?method=login&registered=1');
            exit;
        } else {
            header('Location: ?method=login&error=2');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ?method=login');
        exit;
    }

    public function addProduct()
    {
        session_start();

        if (!empty($_POST['name']) && is_numeric($_POST['stock']) && is_numeric($_POST['pricing'])) {
            $product = [
                'name' => $_POST['name'],
                'stock' => intval($_POST['stock']),
                'pricing' => floatval($_POST['pricing']),
                'added_by' => $_SESSION['email']
            ];

            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
            $products[] = $product;

            setcookie("products", json_encode($products), time() + 3600, "/");
            header('Location: ?method=home');
            exit;
        } else {
            header('Location: ?method=home&error=3');
            exit;
        }
    }

    public function deleteProduct()
    {
        session_start();

        $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
        if (isset($products[$_GET['index']])) {
            unset($products[$_GET['index']]);
            $products = array_values($products); // Reindexar
            setcookie("products", json_encode($products), time() + 3600, "/");
        }
        header('Location: ?method=home');
        exit;
    }

    public function clearProducts()
    {
        setcookie("products", json_encode([]), time() + 3600, "/");
        header('Location: ?method=home');
        exit;
    }

    public function searchProduct()
    {
        // Aseguramos que se envíe una búsqueda
        if (isset($_POST['q'])) {
            $searchTerm = trim($_POST['q']);
            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];

            // Filtrar productos que contengan el término de búsqueda
            $filteredProducts = array_filter($products, function ($product) use ($searchTerm) {
                return stripos($product['name'], $searchTerm) !== false; // Búsqueda sin distinguir mayúsculas
            });

            // Guardar los productos filtrados en una cookie
            setcookie('filtered_products', json_encode(array_values($filteredProducts)), time() + (86400 * 30), "/"); // 30 días de duración
            header("Location: views/search.php"); // Redirigir a la página de búsqueda
            exit();
        }
    }
}
