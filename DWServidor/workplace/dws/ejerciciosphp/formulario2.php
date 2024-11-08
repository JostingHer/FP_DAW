<html>

<body>


  <form action="" method="get">
    <label for="fname">Nombre</label><br>
    <input type="text" name="nombres">
    <input type="submit" value="Enviar">
    <hr>
    <?php
    if (isset($_GET['nombres']) && ($_GET['nombres']) != "") {
      $nombre = $_GET['nombres'];
      echo "hola ".$nombre;
    } else{
      echo "el nombre es obligatorio";
    }
    ?>
  </form>


</body>

</html>