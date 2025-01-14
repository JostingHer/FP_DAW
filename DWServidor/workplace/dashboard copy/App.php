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
        // cualquiera puede acceder a la pagina de login
        include("views/login.php");
    }

    public function home()
    {

        try {

            if (!isset($_SESSION['email'])) {
                throw new UnatherizedAccessException();
            }
            include("views/home.php");
        } catch (UnatherizedAccessException $e) {
            $_SESSION['errorMessage404'] = $e->errorMessage();
            header('Location: ?method=errorPage');
            exit;
        }
    }

    public function totalValue()
    {
        try {

            if (!isset($_SESSION['email'])) {
                throw new UnatherizedAccessException();
            }
            include("views/totalValue.php");
        } catch (UnatherizedAccessException $e) {
            $_SESSION['errorMessage404'] = $e->errorMessage();
            header('Location: ?method=errorPage');
            exit;
        }
    }

    public function searchPage()
    {
        try {

            if (!isset($_SESSION['email'])) {
                throw new UnatherizedAccessException();
            }
            include("views/search.php");
        } catch (UnatherizedAccessException $e) {
            $_SESSION['errorMessage404'] = $e->errorMessage();
            header('Location: ?method=errorPage');
            exit;
        }
    }

    public function addProductPage()
    {
        try {

            if (!isset($_SESSION['email'])) {
                throw new UnatherizedAccessException();
            }
            include("views/addProduct.php");
        } catch (UnatherizedAccessException $e) {
            $_SESSION['errorMessage404'] = $e->errorMessage();
            header('Location: ?method=login');
            exit;
        }
    }

    public function errorPage()
    {
        include("views/404.php");
    }



    private function validateEmail($email)
    {
        if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException(); // Lanzar excepción personalizada para correo no válido
        }
    }

    private function validatePassword($password)
    {
        if (empty($password) || preg_match("/^.{8,}$/", $password) !== 1) {
            throw new InvalidPasswordException("La contraseña debe de tener al menos 8 caracteres"); // Lanzar excepción personalizada para contraseña no válida
        }
    }

    public function mail($email)
    {
        try {
            $to = $email;
            $subject = "Notificación de Inicio de Sesión en Mercado Sparking";
            $message = "Hola,\n\nTe has registrado en Mercado Sparking.\n\nSaludos,\nMercado Sparking";
            $headers = "From: jostinmolina30@gmail.com";
            $headers .= "Reply-To: jostinmolina30@gmail.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            // Enviar correo
            mail($to, $subject, $message, $headers);
        } catch (Exception $e) {
            echo "no quiero hacer nada";
        }
    }

    /**
     * 1. validar que el usuario y la contraseña no estén vacíos
     * 2. validar si son correctos y lanzar mensajes de errores o excepciones
     * 3. vemos si esta registrado el usuario en la cookie
     * 4. si no esta registrado lo registramos, envaimos correo e iniciamos sesion
     * 5. y si ya esta registrado iniciamos sesion
     */

    public function authUser()
    {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        unset($_SESSION['msjInvalidEmail']);
        unset($_SESSION['msjInvalidPassword']);

        try {

            $this->validateEmail($email);
            $this->validatePassword($password);


            // $usersList = isset($_COOKIE['usersList']) ? json_decode($_COOKIE['usersList'], true) : [];
            $usersList = isset($_COOKIE['usersList']) ? unserialize($_COOKIE['usersList']) : [];


            // si ya existe el usuario - iniciamos sesion
            foreach ($usersList as $user) {

                if ($user['email'] === $email) {

                    if (password_verify($password, $user['password'])) {
                        $_SESSION['email'] = $email;
                        header('Location: ?method=home');
                        exit;
                    } else {
                        throw new InvalidPasswordException("No es la contraseña correcta para este usuario");
                    }
                }
            }


            $newUser = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) // Crear un hash seguro para la contraseña
            ];
            $usersList[] = $newUser;


            setcookie('usersList', serialize($usersList), time() + 3600 * 24, "/");
            //setcookie('usersList', json_encode($userList), time() + 3600 * 24, "/");
            $_SESSION['email'] = $email;
            $this->mail($email);
            header('Location: ?method=home');
            exit;
        } catch (InvalidEmailException $e) {
            // Capturar excepción de correo inválido y guardar el mensaje en la sesión
            $_SESSION['msjInvalidEmail'] = $e->errorMessage();
            header('Location: ?method=login');
            exit;
        } catch (InvalidPasswordException $e) {
            $_SESSION['msjInvalidPassword'] = $e->errorMessage();
            header('Location: ?method=login');
            exit;
        } catch (Exception $e) {
            echo "Error inesperado: " . $e->getMessage();
            header('Location: ?method=login');
            exit;
        }
    }



    public function logout()
    {
        session_start();
        $_SESSION = [];
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
        if (isset($_POST['q'])) {
            $searchTerm = trim($_POST['q']);
            $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];

            $filteredProducts = array_filter($products, function ($product) use ($searchTerm) {
                return stripos($product['name'], $searchTerm) !== false; // Búsqueda sin distinguir mayúsculas
            });

            setcookie('filtered_products', json_encode(array_values($filteredProducts)), time() + (86400 * 30), "/");
            header("Location: ?method=searchPage");
            exit();
        }
    }
}
