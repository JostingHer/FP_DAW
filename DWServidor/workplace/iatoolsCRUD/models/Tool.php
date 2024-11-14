<?php

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


    public static function obtenerTodos()
    {
        // Obtener conexión desde Model
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM IAs";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Libro
            $libros = $statement->fetchAll(PDO::FETCH_CLASS, Tool::class);

            return $libros;
        } else {
            return [];
        }
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

    public function setServiceUrl($serviceUrl)
    {
        $this->url = $serviceUrl;
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
