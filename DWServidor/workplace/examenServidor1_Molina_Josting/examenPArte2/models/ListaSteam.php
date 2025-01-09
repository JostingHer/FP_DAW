<?php

require_once 'models/Model.php';

class ListaSteam extends Model
{
    // Atributos privados
    private $id;
    private $codigo_videojuego;
    private $clave;



    public static function obtenerbyIdPost($id)
    {

        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM ListaSteam WHERE codigo_videojuego = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $id);
            $statement->execute();
            $videojuego = $statement->fetchAll(PDO::FETCH_CLASS, Videojuego::class);
            return $videojuego[0];
        } else {
            return [];
        }
    }


    public static function deletebyid($id)
    {

        try {
            $conexion = Model::getConnection();
            $query = "DELETE FROM ListaSteam WHERE codigo_videojuego = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $id);
            $statement->execute();
        } catch (PDOException $e) {
            //echo "Problema en la conexion aqui";
            $mensaje =  $e->getMessage();
            $conexion->rollback();
        } catch (Exception $b) {
            $mensaje = "Problema en la conexion dos";
            $conexion->rollback();
        } finally {
            return $statement;
        }
    }



    public static function insertarNuevoVideojuego($codigo_videojuego, $clave)
    {

        $mensaje = "";
        try {
            $conexion = Model::getConnection();
            $query = "INSERT INTO ListaSteam (`codigo_videojuego`, `clave`) VALUES (?, ?)";
            $statement = $conexion->prepare($query);

            $statement->bindValue(1, $codigo_videojuego);

            if ($clave == "") {
                $statement->bindValue(2, $clave);
            } else {
                $claveHash = password_hash($clave, PASSWORD_ARGON2I);
                $statement->bindValue(2, substr($claveHash, 0, 20));
            }




            $statement->execute();
        } catch (PDOException $e) {
            //echo "Problema en la conexion aqui";
            $mensaje =  $e->getMessage();
            echo $mensaje;
        } catch (Exception $b) {
            $mensaje = "Problema en la conexion dos";
            echo $mensaje;
        }
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of codigo_videojuego
     */
    public function getCodigo_videojuego()
    {
        return $this->codigo_videojuego;
    }

    /**
     * Set the value of codigo_videojuego
     *
     * @return  self
     */
    public function setCodigo_videojuego($codigo_videojuego)
    {
        $this->codigo_videojuego = $codigo_videojuego;

        return $this;
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     *
     * @return  self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }
}
