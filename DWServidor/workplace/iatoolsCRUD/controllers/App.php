
<?php

require_once 'models/Tool.php';


class App

{
    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
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


    public function getAllTools()
    {
        $ias = Tool::obtenerTodos();

        // var_dump($ias);
        include("views/home.php");
    }
}
