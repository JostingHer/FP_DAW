<html>

<body>
<form action="?method=consulta4" method="post">
  <label for="CodigoLibro">Codigo Libro</label><br>
  <input type="text" id="CodigoLibro" name="CodigoLibro" ><br>


  <label for="CodigoTienda">Codigo Tienda</label><br>
  <input type="text" id="CodigoTienda" name="CodigoTienda" ><br>

  <input type="submit" value="Buscar">
</form> 

<?php


try{

    $conexion = new PDO($cadena_conexion,$usuario,$clave);

    if(isset($_POST["CodigoLibro"])&& isset($_POST["CodigoTienda"])){
        $codigolib = $_POST["CodigoLibro"];
        $codigotien = $_POST["CodigoTienda"];

    $sql2 = "SELECT `cantidad` FROM `disponibilidad` WHERE `codigo_libro` =$codigolib and 
    `codigo_tienda` = $codigotien";


    $resultado = $conexion->query($sql2);

    foreach($resultado as $alumno){
        echo $alumno["cantidad"]."<br>";

    }
    $cantidad = $alumno["cantidad"];
    if($cantidad <=0){
        echo "Disponibilidad no encontrada con el libro ".$codigolib . " en la tienda " . $codigotien;
    }


}
}catch(PDOException $e){
    echo "Problema en la conexion";
}finally{
    $conexion = null;
}


?>

</body>

</html>
