<?php
require_once 'models/Model.php';


class Tienda extends Model
{
    private $codigo;
    private $centro_comercial;
    private $direccion;
    private $localidad;
    private $telefono;



    // Getters y Setters
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCentroComercial()
    {
        return $this->centro_comercial;
    }
    public function setCentroComercial($centro_comercial)
    {
        $this->centro_comercial = $centro_comercial;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public static function obtenerTodas()
    {
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM tienda";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Tienda
            $tiendas = $statement->fetchAll(PDO::FETCH_CLASS, Tienda::class);

            return $tiendas;
        } else {
            return [];
        }
    }
}
