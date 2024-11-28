<?php

require_once 'models/Model.php';

class User extends Model
{
    private $id;
    private $nombreUsuario;
    private $password;

    public static function autenticar($nombreUsuario, $password)
    {
        try {
            $conexion = User::getConnection();


            $sql = "SELECT * FROM User WHERE `name` = :nombreUsuario AND `password` = :contrasenya";
            $resultado = $conexion->prepare($sql);
            $resultado->bindValue(':nombreUsuario', $nombreUsuario);
            $resultado->bindValue(':contrasenya', $password);
            $resultado->execute();
            $encontrado = $resultado->fetch();

            if ($encontrado != false) {
                $encontrado = true;
            }

            return $encontrado;
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
        }
    }

    public static function autenticarSoloUsuarioDevolviendoUsuario($nombreUsuario)
    {


        $conexion = User::getConnection();

        $sql = "SELECT * FROM User WHERE `name` = :nombreUsuario";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombreUsuario', $nombreUsuario);
        $resultado->execute();

        $usuario = $resultado->fetch();

        return $usuario;
    }



    public static function introducirUsuario($name, $passHash)
    {
        try {

            $conexion = User::getConnection();

            $sql1 = "INSERT INTO `User` (`name`, `password`) VALUES (?, ?)";

            $insertarUsuario = $conexion->prepare($sql1);
            $insertarUsuario->bindValue(1, $name);
            $insertarUsuario->bindValue(2, $passHash);

            $insertarUsuario->execute();

            // echo "Inserción de videojuego exitosa";
        } catch (PDOException $e) {
            echo $e->getMessage();;
        } finally {
            return $insertarUsuario;
        }
    }

    public static function autenticarSoloUsuario()
    {
        try {
            $conexion = User::getConnection();

            $sql1 = "SELECT * FROM User WHERE `name` = ?";

            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $_POST["name"]);

            $resultado->execute();

            $encontrado = $resultado->fetch();

            if ($encontrado != false) {
                $encontrado = true;
            }
            return $encontrado;
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
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
     * Get the value of nombreUsuario
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set the value of nombreUsuario
     *
     * @return  self
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
