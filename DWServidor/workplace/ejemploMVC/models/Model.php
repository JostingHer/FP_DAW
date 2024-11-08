<?php

require_once("./models/configDB");
class Model
{

    public static function getConnection()
    {

        $conexion = null;
        try {
            $conexion = new PDO(CONEXION, USUARIO, CLAVE);
        } catch (\Throwable $th) {
            //throw $th;
        } finally {
            return $conexion;
        }
    }
}
