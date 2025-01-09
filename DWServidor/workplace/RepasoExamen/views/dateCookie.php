<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Calculadora</title>
</head>

<body>

    <?php




    if (isset($_COOKIE["DATE"])) {
        echo "la ultima vez que visitaste la pagina fue: " . $_COOKIE["DATE"];
        $lastTime = date("Y-m-d H:i:s");
        echo "<br> la fecha de hoy es: " . $lastTime;
        setcookie("DATE", $lastTime, time() + 3600);
    } else {
        $lastTime = date("Y-m-d H:i:s");
        setcookie("DATE", $lastTime, time() + 3600);
        echo "es la primera vez que visitas la pagina";
    }


    ?>
</body>

</html>