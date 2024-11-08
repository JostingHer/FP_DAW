<html>

<head>

</head>

<body>
  <h1>Actualizar libro entre dos años y descuento</h1>
  <form action="?method=ActualizarPrecioLibros" method="post">
    <label for="añopub1">Año de publicacion 1</label><br>
    <input type="text" id="añopub1" name="añopub1"><br>

    <label for="añopub2">Año de publicacion 2</label><br>
    <input type="text" id="añopub2" name="añopub2"><br>

    <label for="descuento">Descuento</label><br>
    <input type="text" id="descuento" name="descuento"><br>

    <input type="submit" value="Actualizar">
  </form>

  <?php

  // haciendo camboio

  if (isset($_POST["añopub1"]) && isset($_POST["añopub2"]) && isset($_POST["descuento"])) {

    if ($resultadoborradodisponibilidad  == true) {
      echo "Se ha actualizado el libro";
    } else {
      echo "No se  ha podido actualizar el libro";
    }
  }

  ?>

</body>

</html>