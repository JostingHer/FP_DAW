<html>

<head>
   
</head>

<body>
    <h1>Buscar Libro por Escritor</h1>
    <form action="?method=consulta1" method="post">
  <label for="Escritor">Escritor</label><br>
  <input type="text" id="Escritor" name="Escritor" ><br>

  <input type="submit" value="Buscar">
    </form>

    <?php

if(isset($_POST["Escritor"])){
    
  foreach($arrayresultados as $libro){
      echo $libro["codigo"]."<br>";
      echo $libro["codigo_escritor"]."<br>";
      echo $libro["titulo"]."<br>";
      echo $libro["agno_publicacion"]."<br>";
      echo $libro["numero_paginas"]."<br>";
      echo $libro["precio"]."<br>";

  }

  }else{
    echo "Libros no encontrados del escritor " .$escritor;
  }


?>



<h1>Consulta 4</h1>
  <form action="?method=consulta4" method="post">
  <label for="titulolibro">Libro</label><br>
  <input type="text" id="titulolibro" name="titulolibro" ><br>


  <input type="submit" value="Buscar">
</form> 

<?php

if(isset($_POST["titulolibro"])){
    
  foreach($arrayresultados as $libro){
      echo $libro["centro_comercial"]."<br>";
      echo $libro["cantidad"]."<br>";

  }

  }else{
    echo "Libros no encontrados del escritor " .$escritor;
  }


?>


</body>

</html>