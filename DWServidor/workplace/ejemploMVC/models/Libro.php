<?php

class Libro extends Model
{
    private $codigo;
    private $codigo_escritor;
    private $titulo;
    private $agno_publicacion;
    private $numero_paginas;
    private $precio;

    // // Constructor
    // public function __construct($codigo = null, $codigo_escritor = null, $titulo = null, $agno_publicacion = null, $numero_paginas = null, $precio = null)
    // {
    //     $this->codigo = $codigo;
    //     $this->codigo_escritor = $codigo_escritor;
    //     $this->titulo = $titulo;
    //     $this->agno_publicacion = $agno_publicacion;
    //     $this->numero_paginas = $numero_paginas;
    //     $this->precio = $precio;
    // }





    // Getters y Setters
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCodigoEscritor()
    {
        return $this->codigo_escritor;
    }
    public function setCodigoEscritor($codigo_escritor)
    {
        $this->codigo_escritor = $codigo_escritor;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAgnoPublicacion()
    {
        return $this->agno_publicacion;
    }
    public function setAgnoPublicacion($agno_publicacion)
    {
        $this->agno_publicacion = $agno_publicacion;
    }

    public function getNumeroPaginas()
    {
        return $this->numero_paginas;
    }
    public function setNumeroPaginas($numero_paginas)
    {
        $this->numero_paginas = $numero_paginas;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    // Método estático para obtener todos los libros
    public static function obtenerTodos()
    {
        // Obtener conexión desde Model
        $conexion = Model::getConnection();
        if ($conexion) {
            $query = "SELECT * FROM libro";
            $statement = $conexion->query($query);

            // Usar PDO::FETCH_CLASS para mapear los resultados a objetos Libro
            $libros = $statement->fetchAll(PDO::FETCH_CLASS, Libro::class);

            return $libros;
        } else {
            return [];
        }
    }
}
