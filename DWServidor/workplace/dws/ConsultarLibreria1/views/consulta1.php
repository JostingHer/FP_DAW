<?php
$cadena_conexion = "mysql:dbname=libreria;host=localhost";
$usuario = "root";
$clave = "";

try{

    $conexion = new PDO($cadena_conexion,$usuario,$clave);

    $sql1 = "SELECT * FROM `escritor` ORDER BY nombre ASC";


    $resultado = $conexion->query($sql1);


    foreach($resultado as $escritor){
        echo $escritor["nombre"]."<br>";

    }



    echo "Conexion establecida con exito";


}catch(PDOException $e){
    echo "Problema en la conexion";
}finally{
    $conexion = null;
}



?>