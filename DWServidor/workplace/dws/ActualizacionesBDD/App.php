<?php
// hacinedo cambios
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

  public function ActualizarPrecioLibros()
  {
    try {

      $conexion = new PDO(CONEXION, USUARIO, CONTRASENYA);
      $descuento = $_POST["descuento"] / 100;

      $sql1 = "UPDATE libro SET precio= precio -(precio* ? )  WHERE agno_publicacion BETWEEN  ?  AND ?";

      $resultadoborradodisponibilidad = $conexion->prepare($sql1);
      $resultadoborradodisponibilidad->bindValue(1, $descuento);
      $resultadoborradodisponibilidad->bindValue(2, $_POST["añopub1"]);
      $resultadoborradodisponibilidad->bindValue(3, $_POST["añopub2"]);
      $resultadoborradodisponibilidad->execute();




      echo "Actualizacion exitosa";
    } catch (PDOException $e) {
      echo "Problema en la conexion";
      $conexion->rollback();
    } catch (Exception $b) {
      echo "Problema en la conexion";
      $conexion->rollback();
    } finally {
      include("views/home.php");
    }
  }

  public function ActualizarTiendasPrefijo()
  {
    try {

      $conexion = new PDO(CONEXION, USUARIO, CONTRASENYA);
      /*
      UPDATE tienda SET telefono = concat(:prefijo,telefono) WHEN localidad = ?
      */

      $sql1 = "INSERT INTO tienda (centro_comercial,direccion,localidad,telefono)  values (?,?,?,?)";

      $insertartienda = $conexion->prepare($sql1);
      $insertartienda->bindValue(1, $_POST["centroComercial"]);
      $insertartienda->bindValue(2, $_POST["localidad"]);
      $insertartienda->bindValue(3, $_POST["direccion"]);
      $insertartienda->bindValue(4, $_POST["telefono"]);
      $insertartienda->execute();


      echo "Inserccion de tienda exitosa";
    } catch (PDOException $e) {
      echo "Problema en la conexion";
      $conexion->rollback();
    } catch (Exception $b) {
      echo "Problema en la conexion";
      $conexion->rollback();
    } finally {
      include("views/home.php");
    }
  }
}
