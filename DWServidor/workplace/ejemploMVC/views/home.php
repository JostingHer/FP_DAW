<html>

<head>

</head>

<body>

    <a href="?method=obtenerEscritores">asdasdasdasd</a>

    <?php



    foreach ($escritores as $dato) {
        echo $dato->getNombre() . "<br/>";
        echo "hola";
    }
    ?>

    <h1>CONSULTAS</h1>

    <p>Consulta 1</p>
    <form id="formConsulta1" action="?method=obtenerLibros" method="post">
        <label for="" id="labelNombreAutor">Nombre de autor</label>
        <input id="nombreAutor" type="text" name="nombreAutor">
        <input id="btnConsulta" type="submit" value="Buscar">
    </form>

    <?php

    var_dump($libros);
    foreach ($libros as $libro) {
        echo $libro->getCodigo()  . "<br>";
        echo $libro->getTitulo() . "<br>";
    }



    ?>


</body>

</html>