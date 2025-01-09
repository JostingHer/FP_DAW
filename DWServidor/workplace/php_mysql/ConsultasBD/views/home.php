<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades consultas</title>
</head>

<body>
    <h1>CONSULTA DE DATOS DE UNA TABLA</h1>
    <a href="?method=getQuery&query=SELECT * FROM escritor">Consultar todos los escritores de la base de datos, en orden por nombre ascendente.</a>

    <?php

    foreach ($results as $fila) {
        echo "<br>" . "Nombre del alumno: " . $fila['nombre'] . "<br>";
    }



    ?>

    <!-- usar el prepare con esta consulta: SELECT * FROM libro WHERE codigo.escritor = ?  y en el params poner codigo = 1-->

    <a href="?method=getQueryPrepare&query=SELECT * FROM libro WHERE codigo.escritor = ?&params=1">Consultar todos los libros escritos por un escritor en particular.</a>

    <?php

    foreach ($results as $fila) {
        echo "<br>" . "Nombre del alumno: " . $fila['nombre'] . "<br>";
    }






    ?>

    <h3>2 CONSULTA DE DATOS DE VARIAS TABLAS</h3>

    <a href="">
        2Consultar el título y el año de publicación de los libros no disponibles de la base de datos.

        SELECT itulo, agno_publicacion FROM libro WHERE codigo NOT IN (SELECT codigo FROM disponibilidad WHERE cantidad > 0);
    </a>


</body>

</html>