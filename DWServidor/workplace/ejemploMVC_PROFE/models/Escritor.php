<?php

require_once 'models/Model.php';

class Escritor extends Model
{

    private $codigo;
    private $nombre;
    private $nacionalidad;
    private $fecha_nacimiento;
    private $fecha_fallecimiento;




    public static function consultarTodos(){
        
        $todosEscritores = null;

        try {
            $conexion = Escritor::db();


            $sql1 = "SELECT * FROM escritor ORDER BY nombre ASC";

            $resultado = $conexion->query($sql1);    
            

            $todosEscritores = $resultado->fetchAll(PDO::FETCH_CLASS, Escritor::class);



        } catch (PDOException) {
            echo "Problema en la conexión";
        } finally{
           
            return $todosEscritores;
        }

    }



    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

}