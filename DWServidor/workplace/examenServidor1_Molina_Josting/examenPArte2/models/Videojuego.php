<?php

require_once 'models/Model.php';

class Videojuego extends Model
{
    // Atributos privados
    private $id;
    private $nombre;
    private $puntuacion;
    private $codigo_desarrollador;


    public static function obtenerbyIdPost()
    {

        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM Videojuego WHERE id = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $_POST['id']);
            $statement->execute();
            $videojuego = $statement->fetchAll(PDO::FETCH_CLASS, Videojuego::class);
            return $videojuego[0];
        } else {
            return [];
        }
    }



    public static function paginate($page = 1, $size = 5)
    {
        //obtener conexión
        $db = Model::getConnection();
        //preparar consulta
        $sql = "SELECT count(id) FROM Videojuego";
        //ejecutar
        $statement = $db->query($sql);
        //recoger datos con fetch_all
        $n = (int) $statement->fetch()[0]; //registros
        $n = ceil($n / $size); //pages

        $offset = ($page - 1) * $size;
        $sql1 = "SELECT * FROM Videojuego LIMIT $offset, $size";;
        $statement = $db->query($sql1);

        //recoger datos con fetch_all
        $videojuegos = $statement->fetchAll(PDO::FETCH_CLASS, Videojuego::class);
        //retornar
        $pages = new stdClass;

        $pages->videojuegos = $videojuegos;
        $pages->n = $n;

        return $pages;
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get the value of codigo_desarrollador
     */
    public function getCodigo_desarrollador()
    {
        return $this->codigo_desarrollador;
    }

    /**
     * Set the value of codigo_desarrollador
     *
     * @return  self
     */
    public function setCodigo_desarrollador($codigo_desarrollador)
    {
        $this->codigo_desarrollador = $codigo_desarrollador;

        return $this;
    }
}
