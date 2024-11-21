<?php

require_once 'models/Model.php';

class Tool
{
    // Atributos privados
    private $id;
    private $name;
    private $company;
    private $url;
    private $year;
    private $category;
    private $description;
    private $price;


    public static function insertarNuevaIA()
    {
        // Obtener conexión desde Model
        // con binvalue

        $mensaje = "";
        try {
            $conexion = Model::getConnection();

            $query = "INSERT INTO IAs (name, company, url, year, category, description, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $conexion->prepare($query);

            $statement->bindValue(1, $_POST['name']);
            $statement->bindValue(2, $_POST['company']);
            $statement->bindValue(3, $_POST['url']);
            $statement->bindValue(4, $_POST['year']);
            $statement->bindValue(5, $_POST['category']);
            $statement->bindValue(6, $_POST['description']);
            $statement->bindValue(7, $_POST['price']);

            $statement->execute();


            $mensaje = "Inserccion de tienda exitosa";
        } catch (PDOException $e) {
            //echo "Problema en la conexion aqui";
            $mensaje =  $e->getMessage();
            $conexion->rollback();
        } catch (Exception $b) {
            $mensaje = "Problema en la conexion dos";
            $conexion->rollback();
        }
    }

    public static function deleteIA()
    {

        $mensaje = "";
        try {
            $conexion = Model::getConnection();
            $query = "DELETE FROM IAs WHERE id = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $_GET['id']);
            $statement->execute();


            $mensaje = "Eliminacion exitosa";
        } catch (PDOException $e) {
            //echo "Problema en la conexion aqui";
            $mensaje =  $e->getMessage();
            $conexion->rollback();
        } catch (Exception $b) {
            $mensaje = "Problema en la conexion dos";
            $conexion->rollback();
        }
    }

    public static function editIA()
    {
        $mensaje = "";
        try {
            $conexion = Model::getConnection();
            $query = "UPDATE IAs SET name = ?, company = ?, url = ?, year = ?, category = ?, description = ?, price = ? WHERE id = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $_POST['name']);
            $statement->bindValue(2, $_POST['company']);
            $statement->bindValue(3, $_POST['url']);
            $statement->bindValue(4, $_POST['year']);
            $statement->bindValue(5, $_POST['category']);
            $statement->bindValue(6, $_POST['description']);
            $statement->bindValue(7, $_POST['price']);
            $statement->bindValue(8, $_GET['id']);
            $statement->execute();
            $mensaje = "Actualizacion exitosa";
        } catch (PDOException $e) {
            //echo "Problema en la conexion aqui";
            $mensaje =  $e->getMessage();
            $conexion->rollback();
        } catch (Exception $b) {
            $mensaje = "Problema en la conexion dos";
            $conexion->rollback();
        }
    }

    public static function obtenerTodos()
    {
        // Obtener conexión desde Model
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM IAs";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Libro
            $tools = $statement->fetchAll(PDO::FETCH_CLASS, Tool::class);

            return $tools;
        } else {
            return [];
        }
    }

    public static function obtenerIAbyId()
    {

        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM IAs WHERE id = ?";
            $statement = $conexion->prepare($query);
            $statement->bindValue(1, $_GET['id']);
            $statement->execute();
            $tools = $statement->fetchAll(PDO::FETCH_CLASS, Tool::class);
            return $tools[0];
        } else {
            return [];
        }
    }




    public static function paginate($page = 1, $size = 10)
    {
        //obtener conexión
        $db = Model::getConnection();
        //preparar consulta
        $sql = "SELECT count(id) FROM IAs";
        //ejecutar
        $statement = $db->query($sql);
        //recoger datos con fetch_all
        $n = (int) $statement->fetch()[0]; //registros
        $n = ceil($n / $size); //pages

        $offset = ($page - 1) * $size;
        $sql1 = "SELECT * FROM IAs LIMIT $offset, $size";
        // $sql2 = "SELECT * FROM IAs WHERE id > $offset LIMIT $size";
        // $sql3 = "SELECT * FROM IAs";
        // //ejecutar
        // $antes = microtime();
        $statement = $db->query($sql1);
        $despues = microtime();
        // echo $despues - $antes;
        //recoger datos con fetch_all
        $tools = $statement->fetchAll(PDO::FETCH_CLASS, Tool::class);
        //retornar
        $pages = new stdClass;

        $pages->tools = $tools;
        $pages->n = $n;

        return $pages;
    }


    // Getters y Setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getYearOfPublication()
    {
        return $this->year;
    }

    public function setYearOfPublication($yearOfPublication)
    {
        $this->year = $yearOfPublication;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
