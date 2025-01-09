<!DOCTYPE html>

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

    <main class="container container-main">


        <?php

        $arrayDesordenado = ["pan", "refrescos", "agua", "galletas", "arroz"];

        function ordenarArrayPorlongitudPalabras($array)
        {
            $arrayOrdenado = [];
            $arrayOrdenado = $array;
            $arrayOrdenado = array_map('strlen', $arrayOrdenado);
            array_multisort($arrayOrdenado, $array);
            return $array;
        }

        $arrayOrdenado = ordenarArrayPorlongitudPalabras($arrayDesordenado);

        echo "<ol>";
        foreach ($arrayOrdenado as $elemento) {

            echo "<li>$elemento</li>";
        }
        echo "</ol>";

        ?>
    </main>




</body>

</html>