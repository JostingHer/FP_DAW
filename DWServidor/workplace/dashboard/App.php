<?php

class App
{
    public function run()
    {
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
        include("./views/search.php");
    }
    public function addProductPage()
    {
        include("./views/addProduct.php");
    }
    public function auth()
    {
        session_start(); // Inicia la sesión

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Recuperar lista de usuarios de cookies
            $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];
            $authenticated = false;

            // Verificar autenticación (comparación directa)
            foreach ($users as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    $_SESSION['email'] = $email;
                    $authenticated = true;
                    break;
                }
            }

            if ($authenticated) {
                header('Location: ?method=home');
            } else {
                header('Location: ?method=login&error=1'); // Error 1: Credenciales incorrectas
            }
            exit;
        }
    }

    public function registerUser()
    {
        session_start(); // Opcional si se requiere sesión aquí

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];

            // Verificar si el usuario ya existe
            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    header('Location: ?method=login&error=3'); // Error 3: Usuario ya registrado
                    exit;
                }
            }

            // Crear un nuevo usuario y guardarlo en cookies
            $user = ['email' => $email, 'password' => $password];
            $users[] = $user;
            setcookie("users", json_encode($users), time() + 3600 * 24);

            header('Location: ?method=login&registered=1'); // Éxito: Registro completado
            exit;
        } else {
            header('Location: ?method=login&error=2'); // Error 2: Datos incompletos
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?method=login');
        exit;
    }

    public function addProduct()
    {
        if (!empty($_POST['name']) && is_numeric($_POST['stock']) && is_numeric($_POST['pricing'])) {
            $product = [
                'name' => $_POST['name'],
                'stock' => intval($_POST['stock']),
                'pricing' => floatval($_POST['pricing']),
                'added_by' => $_SESSION['email']
            ];

            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
            $products[] = $product;

            setcookie("products", json_encode($products), time() + 3600);
            header('Location: ?method=home');
            exit;
        } else {
            header('Location: ?method=home&error=3');
            exit;
        }
    }

    public function deleteProduct()
    {
        $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
        if (isset($products[$_GET['index']])) {
            unset($products[$_GET['index']]);
            $products = array_values($products);
            setcookie("products", json_encode($products), time() + 3600);
        }
        header('Location: ?method=home');
        exit;
    }

    public function clearProducts()
    {
        setcookie("products", json_encode([]), time() + 3600);
        header('Location: ?method=home');
        exit;
    }

    public function searchProduct()
    {
        // Verifica si existe un término de búsqueda
        if (isset($_GET['q']) && $_GET['q'] !== "") {
            $searchTerm = strtolower(trim($_GET['q']));
            // Obtener productos desde la cookie
            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];

            // Filtrar productos por coincidencia en el nombre
            $filteredProducts = array_filter($products, function ($product) use ($searchTerm) {
                return stripos($product['name'], $searchTerm) !== false; // Coincidencias no sensibles a mayúsculas
            });

            // Guardamos los resultados filtrados en una cookie
            if (!empty($filteredProducts)) {
                setcookie("filtered_products", json_encode(array_values($filteredProducts)), time() + 3600, "/"); // Agregar "/" para el ámbito de la cookie
            } else {
                // Si no hay coincidencias, vaciar la cookie
                setcookie("filtered_products", "", time() - 3600, "/");
            }
        } else {
            // Si no hay término de búsqueda, limpiar la cookie de filtrado
            setcookie("filtered_products", "", time() - 3600, "/");
        }

        // Redirigir a la página de búsqueda
        header('Location: ?method=searchPage');
        exit;
    }


    public function filterByAddedBy($email)
    {
        $products = json_decode($_COOKIE['products'] ?? '[]', true);

        // Filtrar productos por el usuario que los agregó
        $filteredProducts = array_filter($products, function ($product) use ($email) {
            return $product['added_by'] === $email;
        });

        // Guardar los resultados filtrados en una cookie
        setcookie("filtered_products", json_encode(array_values($filteredProducts)), time() + 3600);

        header('Location: ?method=buscarProducto');
        exit;
    }

    public function filterByPricing($minPrice = 0, $maxPrice = PHP_INT_MAX)
    {
        $products = json_decode($_COOKIE['products'] ?? '[]', true);

        // Filtrar productos por rango de precios
        $filteredProducts = array_filter($products, function ($product) use ($minPrice, $maxPrice) {
            return $product['pricing'] >= $minPrice && $product['pricing'] <= $maxPrice;
        });

        // Guardar los resultados filtrados en una cookie
        setcookie("filtered_products", json_encode(array_values($filteredProducts)), time() + 3600);

        header('Location: ?method=buscarProducto');
        exit;
    }

    public function filterByStock($minStock = 0)
    {
        $products = json_decode($_COOKIE['products'] ?? '[]', true);

        // Filtrar productos por stock mínimo
        $filteredProducts = array_filter($products, function ($product) use ($minStock) {
            return $product['stock'] >= $minStock;
        });

        // Guardar los resultados filtrados en una cookie
        setcookie("filtered_products", json_encode(array_values($filteredProducts)), time() + 3600);

        header('Location: ?method=buscarProducto');
        exit;
    }


    public function sortByStock()
    {
        $products = json_decode($_COOKIE['products'] ?? '[]', true);

        // Ordenar productos por stock de menor a mayor
        usort($products, function ($a, $b) {
            return $a['stock'] <=> $b['stock'];
        });

        // Guardar los productos ordenados en una cookie
        setcookie("filtered_products", json_encode(array_values($products)), time() + 3600);

        header('Location: ?method=buscarProducto');
        exit;
    }
}
