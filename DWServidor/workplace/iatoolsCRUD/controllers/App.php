
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

        Tool::insertarNuevaIA();
        include("views/formia.php");
    }
    public function deleteProduct()
    {
        Tool::deleteIA();
        $this->home();
    }

    public function editProduct()
    {
        //Tool::editIA();

        // hay que hacer un consulta 
        // y luego hay que setear el formularip
        // y luegp hay que hacer un update, eliminar y crear uno con el mismo id
        $this->home();
    }




    public function getAllTools()
    {
        $ias = Tool::obtenerTodos();

        // var_dump($ias);
        include("views/home.php");
    }
}
