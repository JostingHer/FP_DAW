<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Calculadora</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/form.css" />
</head>

<body>


    <header class="header">
        <h1 class="header__title"><a href="?method=cookies">EJERCICIO COOKIES</a></h1>
        <ul class="header__nav">
            <li><a href="?method=arrays">ejercicio arrays</a></li>
            <li><a href="?method=cookies">ejercicio cookies</a></li>
            <li><a href="?method=ficheros">ejercicio ficheros</a></li>
        </ul>
    </header>
    <form action="?method=anyadirProducto" method="post">
        <label for="fname">Producto:</label><br>
        <input type="text" id="producto" name="producto"><br>
        <input class="btn" type="submit" value="Submit">
    </form>
    <a class="btn" href="?method=mostrarProductos">
        mostrar
    </a>


</body>

</html>