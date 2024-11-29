
<?php

require_once 'models/Compania.php';
require_once 'models/Videojuego.php';
require_once 'models/ListaSteam.php';


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

        $pages = Videojuego::paginate($page, 5);

        include("views/home.php");
    }

    public function milistaPage()
    {
        include("views/milista.php");
    }


    public function insertar()
    {
        $_SESSION['errorInsertar'] = '';
        $_SESSION['exitoInsertar'] = '';


        if (
            (isset($_POST['id'])  && trim($_POST['id']) != "")

        ) {

            $nuevoVideojuego = Videojuego::obtenerbyIdPost();


            if ($nuevoVideojuego) {
                ListaSteam::insertarNuevoVideojuego($nuevoVideojuego->getId(), $_POST['clave']);


                $_SESSION['exitoInsertar'] = 'Insertado correctamente';
                include("views/milista.php");
            } else {
                $_SESSION['errorInsertar'] = 'No existe el videojuego';

                include("views/milista.php");
            }
        } else {

            $_SESSION['errorInsertar'] = 'esta vacio el campo';
            include("views/milista.php");
        }
    }


    public function eliminar()
    {
        $_SESSION['errorBorrar'] = '';
        $_SESSION['exitoBorrar'] = '';


        if (
            (isset($_POST['id'])  && trim($_POST['id']) != "")

        ) {

            // comprobamos si existe
            $videojuegoAeliminar = ListaSteam::obtenerbyIdPost($_POST['id']);

            if (
                !$videojuegoAeliminar
            ) {
                $_SESSION['errorBorrar'] = 'No existe el videojuego o ya se ha borrado';
                include("views/milista.php");
            } else {
                $seHaBorrado = ListaSteam::deletebyid($_POST['id']);
                if ($seHaBorrado) {


                    $_SESSION['exitoBorrar'] = 'borrado correctamente';
                    include("views/milista.php");
                } else {
                    $_SESSION['errorBorrar'] = 'No se ha podido borrar';

                    include("views/milista.php");
                }
            }
        } else {

            $_SESSION['errorBorrar'] = 'No se ha podido borrar';
            include("views/milista.php");
        }
    }
}
