<?php

class Escritor extends Model
{
    private $codigo;
    private $nombre;
    private $nacionalidad;
    private $fecha_nacimiento;
    private $fecha_fallecimiento;

    // Constructor
    public function __construct($codigo = null, $nombre = null, $nacionalidad = null, $fecha_nacimiento = null, $fecha_fallecimiento = null)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->fecha_fallecimiento = $fecha_fallecimiento;
    }

    // Getters y Setters
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getFechaFallecimiento()
    {
        return $this->fecha_fallecimiento;
    }
    public function setFechaFallecimiento($fecha_fallecimiento)
    {
        $this->fecha_fallecimiento = $fecha_fallecimiento;
    }

    public static function obtenerTodos()
    {
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM escritor";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Escritor
            $escritores = $statement->fetchAll(PDO::FETCH_CLASS, Escritor::class);

            return $escritores;
        } else {
            return [];
        }
    }
}
