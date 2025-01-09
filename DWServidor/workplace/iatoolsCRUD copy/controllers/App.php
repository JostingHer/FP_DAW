
<?php

require_once 'models/Tool.php';
require_once 'models/User.php';


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

    //    Ejemplo header
    public function logout()
    {
        header('Location: login');
    }


    public function auth()
    {
        if ($_POST['name'] != "" && $_POST['password'] != "") {

            $encontrado = User::autenticar($_POST['name'], $_POST['password']);

            if ($encontrado) {
                //usuario autenticad, redirige a home
                header('Location: login');
            } else {
                header('Location: login');
            }
        }
    }

    public function auth2()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {

                $encontrado = User::autenticarSoloUsuario($_POST['name']);

                if (!$encontrado) {
                    User::introducirUsuario($_POST['name'], $_POST['password']);

                    header('Location: home');
                } else {
                    $correcto = User::autenticar($_POST['name'], $_POST['password']);

                    if ($correcto) {
                        header('Location: home');
                    } else {
                        header('Location: login');
                    }
                }
            }
        }
    }

    public function authDefinitivo()
    {

        unset($_SESSION['camposVacios']);
        unset($_SESSION['claveIncorrecta']);

        if (
            ((isset($_POST['name']) && isset($_POST['password'])))
            &&
            ($_POST['name'] != "" && $_POST['password'] != "")
        ) {

            $usuario = User::autenticarSoloUsuarioDevolviendoUsuario($_POST['name']);

            if (!$usuario) {
                $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                User::introducirUsuario($_POST['name'], $hash);
                //include("views/home.php");
                header('Location: ?method=home');
            } else {
                $correcto = password_verify($_POST['password'], $usuario['password']);

                if ($correcto) {
                    //    $this->home();
                    header('Location: ?method=home');
                } else {
                    $_SESSION['claveIncorrecta'] = 'La contraseña es incorrecta';
                    include("views/login.php");
                }
            }
        } else {
            //mensaje de error en una cookie que dure 30s

            $_SESSION['camposVacios'] = 'Debes rellenar todos los campos';

            include("views/login.php");
        }
    }
    public function authDefinitivoV1()
    {


        if (isset($_POST['name']) && isset($_POST['password'])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {


                $usuario = User::autenticarSoloUsuarioDevolviendoUsuario($_POST['name']);

                if (!$usuario) {
                    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    User::introducirUsuario($_POST['name'], $hash);
                    $this->home();

                    //header('Location: ?method=home');
                } else {
                    $correcto = password_verify($_POST['password'], $usuario['contrasenya']);

                    if ($correcto) {
                        $this->home();
                        // header('Location: ?method=home');
                    } else {
                        $this->login();
                        //header('Location: ?method=login');
                    }
                }
            }
        }
    }


    public function home()
    {
        if ($_GET['page']) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $pages = Tool::paginate($page, 10);

        include("views/home.php");
    }

    public function addProduct()
    {
        include("views/formia.php");
    }
    public function updateProduct()
    {
        $iaUpdate = Tool::obtenerIAbyId();

        include("views/formiaUpdate.php");
    }

    public function insertIAs()
    {
        $_SESSION['camposVacios'] = '';

        if (
            (isset($_POST['name'])  && trim($_POST['name']) != "")         &&
            (isset($_POST['company'])   && trim($_POST['company']) != "")       &&
            (isset($_POST['url'])   && trim($_POST['url']) != "")         &&
            (isset($_POST['year'])   && trim($_POST['year']) != "")       &&
            (isset($_POST['category'])  && trim($_POST['category']) != "")      &&
            (isset($_POST['description'])  && trim($_POST['description']) != "")   &&
            (isset($_POST['price'])  && trim($_POST['price']) != "")
        ) {

            Tool::insertarNuevaIA();
            include("views/formia.php");
        } else {

            $_SESSION['camposVacios'] = 'Debes rellenar todos los campos';
            include("views/formia.php");
        }
    }


    public function deleteProduct()
    {
        Tool::deleteIA();
        $this->home();
    }

    public function editProduct()
    {

        $_SESSION['camposVacios'] = '';

        if (
            (isset($_POST['name'])  && trim($_POST['name']) != "")         &&
            (isset($_POST['company'])   && trim($_POST['company']) != "")       &&
            (isset($_POST['url'])   && trim($_POST['url']) != "")         &&
            (isset($_POST['year'])   && trim($_POST['year']) != "")       &&
            (isset($_POST['category'])  && trim($_POST['category']) != "")      &&
            (isset($_POST['description'])  && trim($_POST['description']) != "")   &&
            (isset($_POST['price'])  && trim($_POST['price']) != "")
        ) {
            Tool::editIA($_POST['name'], $_POST['company'], $_POST['url'], $_POST['year'], $_POST['category'], $_POST['description'], $_POST['price'], $_POST['id']);
            $this->home();
        } else {
            $_SESSION['camposVacios'] = 'Debes rellenar todos los campos';

            $iaUpdate = Tool::obtenerIAbyIdPost();

            include("views/formiaUpdate.php");
        }
    }




    public function getAllTools()
    {
        $ias = Tool::obtenerTodos();

        // var_dump($ias);
        include("views/home.php");
    }
}
