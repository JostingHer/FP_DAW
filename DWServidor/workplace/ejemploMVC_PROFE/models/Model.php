<?php
require_once 'models/configDB.php';

class Model
{

    public static function db()
    {
        $conexion = null;
        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BBDD, CONTRA_BBDD);
        } catch (PDOException) {
            echo "Problema en la conexión";
        }
        return $conexion;
    }

}
