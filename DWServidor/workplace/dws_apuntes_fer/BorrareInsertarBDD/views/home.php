<html>

<head>
   
</head>

<body>
    <h1>Borrar tienda y disponibilidad</h1>
    <form action="?method=borrarTiendaYDisponibilidad" method="post">
  <label for="codigoTienda">Codigo Tienda</label><br>
  <input type="text" id="codigoTienda" name="codigoTienda" ><br>

  <input type="submit" value="Eliminar">
    </form>

    <?php



if(isset($_POST["codigoTienda"])){
    
  if($resultadoborradodisponibilidad  == true){
   echo "Se ha borrado la tienda";

  }else{
    echo "No se  ha podido borrar la tienda";
  }
}

?>

<h1>InsertarTienda</h1>
    <form action="?method=InsertarTienda" method="post">
  <label for="centroComercial">Centro comercial</label><br>
  <input type="text" id="centroComercial" name="centroComercial" ><br>

  <label for="localidad">localidad</label><br>
  <input type="text" id="localidad" name="localidad" ><br>

  <label for="direccion"> direccion</label><br>
  <input type="text" id="direccion" name="direccion" ><br>

  <label for="telefono">Telefono</label><br>
  <input type="text" id="telefono" name="telefono" ><br>

  <input type="submit" value="Insertar">
    </form>

    <?php



if(isset($_POST["centroComercial"]) && isset($_POST["localidad"]) && isset($_POST["direccion"]) && isset($_POST["telefono"])){
    
  if($insertartienda  == true){
      echo "Se ha insertado la tienda con exito";
  

  }else{
    echo "No se ha podido insertar la tienda";
  }
}
?>

</body>

</html>