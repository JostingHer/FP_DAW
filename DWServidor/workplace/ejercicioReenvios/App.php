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
        include("views/home.php");
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
}
