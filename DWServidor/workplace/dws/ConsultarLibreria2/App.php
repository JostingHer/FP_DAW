<?php

require_once "ConfigDB.php";

class App

{
  public function run2()
  {
    if (isset($_GET['method'])) {
      $method = $_GET['method'];
    } else {
      $method = 'home';
    }
    $this->$method();
  }

  public function home()
  {
    
    include("views/home.php");
 
  }

  public function consulta1()
  {
    try{
      $conexion = new PDO(CONEXION,USUARIO,CONTRASENYA);
    if(isset($_POST["Escritor"]) && $_POST["Escritor"] != ""){

      $sql2 = "SELECT * FROM `libro` WHERE `codigo_escritor` IN 
      (SELECT `codigo` FROM `escritor` WHERE `nombre`= :varNombre) ORDER BY `agno_publicacion` ASC";
    
      $resultado = $conexion->prepare($sql2);
      $resultado->bindValue(':varNombre',$_POST["Escritor"]);
      $resultado->execute();
      $arrayresultados = $resultado->fetchAll();

  }
  
    }catch(PDOException $e){  
      echo "Problema en la conexion";
    }finally{
      include("views/home.php");
      $conexion = null;
    }

  } 



  public function consulta4()
  {
    try{
      $conexion = new PDO(CONEXION,USUARIO,CONTRASENYA);
    if(isset($_POST["titulolibro"]) && $_POST["titulolibro"] != ""){

      $sql2 = "SELECT centro_comercial, cantidad FROM tienda JOIN disponibilidad AS d ON tienda.codigo 
      = codigo_tienda JOIN libro ON libro.codigo = codigo_libro WHERE titulo = :varNombre ";
    
      $resultado = $conexion->prepare($sql2);
      $resultado->bindValue(':varNombre',$_POST["titulolibro"]);
      $resultado->execute();
      $arrayresultados = $resultado->fetchAll();

  }
  
    }catch(PDOException $e){  
      echo "Problema en la conexion";
    }finally{
      include("views/home.php");
      $conexion = null;
    }

}
}