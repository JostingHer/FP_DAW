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


    public function new()
    {

        if (isset($_POST['deseos'])) {
            $deseos = json_decode($_COOKIE['deseos'], true);
            $deseos[] = $_POST['deseos'];
            setcookie("deseos", json_encode($deseos), time() + 3600);
            header('Location: ?method=home');
        }
    }

    public function delete()
    {
        $deseos = json_decode($_COOKIE['deseos'], true);
        unset($deseos[$_GET['index']]);

        $nuevosDeseos = array_values($deseos);

        setcookie("deseos", json_encode($nuevosDeseos), time() + 3600);
        header('Location: ?method=home');
    }



    // Setear el input text


    public function setEdit()
    {

        if (isset($_POST['deseos'])) {
            $deseos = json_decode($_COOKIE['deseos'], true);
            $deseos[$_GET['index']] = $_POST['deseos'];
            setcookie("deseos", json_encode($deseos), time() + 3600);
            header('Location: ?method=home');
        }
    }
    public function edit() {}



    public function empty()
    {
        setcookie("deseos", json_encode([]), time() + 3600);
        header('Location: ?method=home');
    }
}
