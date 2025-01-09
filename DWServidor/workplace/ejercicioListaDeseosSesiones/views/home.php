<html>

<head>
  <title></title>
</head>

<body>
  <h2>Lista de deseos:</h2>

  <ol>
    <?php
    session_start();
    //Listo los elementos por pantalla uno a uno
    session_start();  // Inicia la sesión siempre al principio
    if (isset($_SESSION["listaDeseos"])) {
      $lista = $_SESSION["listaDeseos"];
      foreach ($lista as $elemento) {
        echo  "<li>$elemento</li>";
      }
    } else {
      echo "¡Lista de Deseos Vacía!";
    }
    ?>
  </ol>



  <form action="?method=new" method="post">
    <label for="">Añade un deseo: </label><br>
    <input type="text" name="deseoNuevo" value="">

    <input type="submit" value="Añadir Deseo">
  </form>

  <form action="?method=delete" method="post">
    <label for="">Borra un deseo por número: </label><br>
    <input type="text" name="numero" value="">

    <input type="submit" value="Borrar Deseo">
  </form>

  <a href="?method=empty">Vaciar Lista Deseos</a><br><br>

  <a href="?method=close">Cerrar Sesión</a>




</body>

</html>