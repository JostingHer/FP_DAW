<?php
// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

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

        // mensajes de error y validaciones

        // para no acumular varibles de sesion de errores
        // las creamos y las eliminamos en cada validacion en cada reload

        unset($_SESSION['msjInvalidEmail']);
        unset($_SESSION['msjInvalidPassword']);

        try {

            // Validar el correo (lanzará una excepción si es inválido)
            $this->validateEmail($email);

            // Validar la contraseña (lanzará una excepción si es inválida)
            $this->validatePassword($password);

            /**
             * json_decode
             * si es true los objetos JSON se devuelven como arrays asociativos
             * si es false los objetos JSON se devuelven como objetos
             * 
             */
            // $usersList = isset($_COOKIE['usersList']) ? json_decode($_COOKIE['usersList'], true) : [];
            $usersList = isset($_COOKIE['usersList']) ? unserialize($_COOKIE['usersList']) : [];


            // si ya existe el usuario - iniciamos sesion
            // tratamos el caso de que el usuario ya exista y la contraseña sea incorrecta
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

            // si no existe el usuario si no existe lo agregamos e iniciamos sesion

            $newUser = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) // Crear un hash seguro para la contraseña
            ];
            $usersList[] = $newUser;
            // array_push($usersList, $newUser);

            /** setCookie(clave, valor, tiempo de vida) 
             *  "/" - significa que la cookie está disponible en todo el sitio
             * 
             */
            setcookie('usersList', serialize($usersList), time() + 3600 * 24, "/");
            //setcookie('usersList', json_encode($userList), time() + 3600 * 24, "/");
            $_SESSION['email'] = $email;

            // enviar un correo de nuevo registro
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
            header("Location: ?method=searchPage"); // Redirigir a la página de búsqueda
            exit();
        }
    }

    // public function mail($emailDestino)
    // {
    //     $mail = new PHPMailer(true);

    //     try {
    //         // Configuración del servidor SMTP
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';                   // Servidor SMTP de Gmail
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'jostinmolina30@gmail.com';     // Dirección de correo del remitente
    //         $mail->Password = 'contraseña_de_aplicacion';     // Contraseña de aplicación generada en Gmail
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar TLS
    //         $mail->Port = 587;                                // Puerto SMTP para TLS

    //         // Configuración del remitente
    //         $mail->setFrom('jostinmolina30@gmail.com', 'Mercado Sparking'); // Remitente

    //         // Configuración del destinatario
    //         $mail->addAddress($emailDestino);                 // Destinatario (parámetro de la función)

    //         // Contenido del correo
    //         $mail->isHTML(true);
    //         $mail->Subject = 'Notificación de Inicio de Sesión en Mercado Sparking';
    //         $mail->Body    = 'Hola,<br><br>Te has registrado en <b>Mercado Sparking</b>.<br><br>Saludos,<br>Mercado Sparking';
    //         $mail->AltBody = 'Hola, te has registrado en Mercado Sparking. Saludos, Mercado Sparking'; // Texto alternativo para clientes sin soporte HTML

    //         // Enviar el correo
    //         if (!$mail->send()) {
    //             throw new Exception('No se pudo enviar el correo: ' . $mail->ErrorInfo);
    //         } else {
    //             echo 'Correo enviado correctamente';
    //         }
    //     } catch (Exception $e) {
    //         echo "Error al enviar el correo: {$e->getMessage()}";
    //     }
    // }
}
