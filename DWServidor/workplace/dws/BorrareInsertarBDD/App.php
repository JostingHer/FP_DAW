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

  public function borrarTiendaYDisponibilidad()
  {
    try{

      $conexion = new PDO(CONEXION,USUARIO,CONTRASENYA);
    if(isset($_POST["codigoTienda"]) && $_POST["codigoTienda"] != ""){
      $codigolibreria = $_POST["codigoTienda"];
    }

      $sql1 = "DELETE FROM disponibilidad  WHERE codigo_tienda = ?";
      $sql2 = "DELETE FROM tienda WHERE codigo = :codigoTienda";

    
      $resultadoborradodisponibilidad = $conexion->prepare($sql1);
      $resultadoborradodisponibilidad->bindValue(1, $codigolibreria);
      $resultadoborradodisponibilidad->execute();

      $resultadoborradotienda = $conexion->prepare($sql2);

      $resultadoborradotienda->execute(array(':codigoTienda'=>$codigolibreria));

      echo "eliminacion de tienda exitosa";

  
    }catch(PDOException $e){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }catch(Exception $b){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }finally{
      include("views/home.php");
    }

  } 

  public function InsertarTienda()
  {
    try{

      $conexion = new PDO(CONEXION,USUARIO,CONTRASENYA);
   

      $sql1 = "INSERT INTO tienda (centro_comercial,direccion,localidad,telefono)  values (?,?,?,?)";

      $insertartienda = $conexion->prepare($sql1);
      $insertartienda->bindValue(1, $_POST["centroComercial"]);
      $insertartienda->bindValue(2, $_POST["localidad"]);
      $insertartienda->bindValue(3, $_POST["direccion"]);
      $insertartienda->bindValue(4, $_POST["telefono"]);
      $insertartienda->execute();
 
   
      echo "Inserccion de tienda exitosa";

  
    }catch(PDOException $e){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }catch(Exception $b){  
      echo "Problema en la conexion";
      $conexion->rollback();
    }finally{
      include("views/home.php");
    }

  }



}