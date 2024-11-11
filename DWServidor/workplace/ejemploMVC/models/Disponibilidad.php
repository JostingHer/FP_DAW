<?php
require_once 'models/Model.php';

class Disponibilidad extends Model
{
    private $codigo_libro;
    private $codigo_tienda;
    private $cantidad;
    private $fecha_ultima_reposicion;




    // Getters y Setters
    public function getCodigoLibro()
    {
        return $this->codigo_libro;
    }
    public function setCodigoLibro($codigo_libro)
    {
        $this->codigo_libro = $codigo_libro;
    }

    public function getCodigoTienda()
    {
        return $this->codigo_tienda;
    }
    public function setCodigoTienda($codigo_tienda)
    {
        $this->codigo_tienda = $codigo_tienda;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFechaUltimaReposicion()
    {
        return $this->fecha_ultima_reposicion;
    }
    public function setFechaUltimaReposicion($fecha_ultima_reposicion)
    {
        $this->fecha_ultima_reposicion = $fecha_ultima_reposicion;
    }
    public static function obtenerTodas()
    {
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM disponibilidad";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Disponibilidad
            $disponibilidades = $statement->fetchAll(PDO::FETCH_CLASS, Disponibilidad::class);

            return $disponibilidades;
        } else {
            return [];
        }
    }
}
