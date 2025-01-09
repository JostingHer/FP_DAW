<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades consultas</title>
</head>

<body>

    <h1>CONSULTA DE DATOS DE UNA TABLA</h1>


</body>

</html>

<?php
$cadena_conexion = 'mysql:dbname=libreria; host=localhost';

$usuario = "root";
$clave = "";

try {

    $conexion = new PDO($cadena_conexion, $usuario, $clave);

    $sql = "SELECT * FROM";
    $resultado = $conexion->query($sql);

    foreach ($resultado as $fila) {
        echo "Nombre del alumno: " . $fila['nombre'] . " - Nombre del curso: " . $fila['nombre'] . "<br>";
    }

    echo "Conexión exitosa";

    $resultadoV2 = $conexion->prepare("SELECT alumno.nombre FROM `alumno` INNER JOIN `curso` ON alumno.codigo_curso = curso.codigo where curso.nombre = ? ");

    $resultadoV2->execute(array("Web"));

    foreach ($resultadoV2 as $fila) {
        echo "<br>" . "Nombre del alumno: " . $fila['nombre'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
} finally {
    // para cerrar la conexión
    $conexion = null;
}
