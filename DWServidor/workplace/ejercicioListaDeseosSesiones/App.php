<?php
class App
{
    public function run()
    {
        if (isset($_POST['method'])) {
            $method = $_POST['method'];
        } else {
            $method = 'login';
        }
        $this->$method();
    }

    public function home()
    {
        include("views/home.php");
    }

    public function login()
    {
        include("views/login.php");
    }

    public function auth()
    {
        if (isset($_POST["name"]) && isset($_POST["password"])) {

            $name = $_POST["name"];
            $password = $_POST["password"];
            session_start();

            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;

            header("Location: ?method=home");
        }
    }

    public function new()
    {
        session_start();  // Inicia la sesión siempre al principio

        if (isset($_POST["deseoNuevo"]) && $_POST["deseoNuevo"] != "") {
            // Verifica si ya existe una lista en la sesión, si no, la inicializa como un array vacío
            if (isset($_SESSION["listaDeseos"])) {

                //$_SESSION["listaDeseos][] = $_post["deseo"];

                $lista = $_SESSION["listaDeseos"];
            } else {
                //$_SESSION["listaDeseos] = $_post["deseo"];
                $lista = [];
            }

            // Agrega el nuevo deseo a la lista
            $lista[] = $_POST["deseoNuevo"];

            // Actualiza la lista de deseos en la sesión
            $_SESSION["listaDeseos"] = $lista;
        }

        header("Location: ?method=home");
    }



    public function delete()
    {
        session_start();  // Inicia la sesión siempre al principio
        if (isset($_POST["numero"]) && $_POST["numero"] != "") {

            if (isset($_SESSION["listaDeseos"])) {
                $lista = ($_SESSION["listaDeseos"]);
                foreach ($lista as $clave => $valor) {
                    if ($clave == $_POST["numero"] - 1) {
                        unset($lista[$clave]);

                        $lista = array_values($lista);
                        $_SESSION["listaDeseos"] = $lista;
                    }

                    header("Location: ?method=home");
                }
            }
        }
    }

    public function empty()
    {
        session_start();
        session_destroy();

        header("Location: ?method=home");
    }

    public function close()
    {
        session_start();
        session_destroy();

        header("Location: ?method=login");
    }
}
