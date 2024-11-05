<?php
require_once "configDB.php";
class App
{

    public function run()
    {
        include("views/home.php");
    }



    public function borrarTiendaYDisponibilidad()
    {
        $results = [];


        try {
            $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);


            $sql = $query;

            $results = $connection->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connection = null;
        }
        return $results;
    }
}
