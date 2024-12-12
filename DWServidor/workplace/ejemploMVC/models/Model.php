<?php


require_once("models/configDB.php");
class Model
{

    public static function getConnection()
    {

        $conexion = null;
        try {
            $conexion = new PDO(CONEXION, USUARIO, CLAVE);
        } catch (PDOException) {
            echo "problema de conexión";
        } finally {
            return $conexion;
        }
    }
}
