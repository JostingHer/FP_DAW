<?php
// App.php
require_once 'config.php';

class App
{
    public $resultado = [];

    public run(){
        include 'views/home.php';
    }

    private function connectDB()
    {
        $cadena_conexion = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        return new PDO($cadena_conexion, DB_USER, DB_PASS);
    }

    public function obtenerLibros()
    {
        try {
            $conexion = $this->connectDB();
            $sql = "SELECT titulo FROM libros WHERE codigo_categoria IN (
                        SELECT codigo FROM categorias WHERE nombre = ?
                    )";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(['Ficción']); // Parámetro ejemplo: Ficción

            $this->resultado = [];
            foreach ($resultado as $libro) {
                $this->resultado[] = $libro;
            }

            echo "Consulta ejecutada con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión: " . $e->getMessage();
        } finally {
            $conexion = null;
            include 'views/home.php';
        }
    }

    public function obtenerAutores()
    {
        try {
            $conexion = $this->connectDB();
            $sql = "SELECT nombre FROM autores WHERE id_autor IN (
                        SELECT autor_id FROM libros WHERE titulo = ?
                    )";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(['El Principito']); // Parámetro ejemplo: El Principito

            $this->resultado = [];
            foreach ($resultado as $autor) {
                $this->resultado[] = $autor;
            }

            echo "Consulta ejecutada con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión: " . $e->getMessage();
        } finally {
            $conexion = null;
            include 'views/home.php';
        }
    }

    public function obtenerEditoriales()
    {
        try {
            $conexion = $this->connectDB();
            $sql = "SELECT nombre FROM editoriales WHERE id_editorial IN (
                        SELECT editorial_id FROM libros WHERE titulo = ?
                    )";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(['Harry Potter']); // Parámetro ejemplo: Harry Potter

            $this->resultado = [];
            foreach ($resultado as $editorial) {
                $this->resultado[] = $editorial;
            }

            echo "Consulta ejecutada con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión: " . $e->getMessage();
        } finally {
            $conexion = null;
            include 'views/home.php';
        }
    }

    public function obtenerCategorias()
    {
        try {
            $conexion = $this->connectDB();
            $sql = "SELECT nombre FROM categorias WHERE codigo IN (
                        SELECT codigo_categoria FROM libros WHERE titulo = ?
                    )";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(['Don Quijote']); // Parámetro ejemplo: Don Quijote

            $this->resultado = [];
            foreach ($resultado as $categoria) {
                $this->resultado[] = $categoria;
            }

            echo "Consulta ejecutada con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión: " . $e->getMessage();
        } finally {
            $conexion = null;
            include 'views/home.php';
        }
    }
}
