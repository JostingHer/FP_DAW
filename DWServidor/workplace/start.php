<html>

<head>
    <title>Ejercicio de listas</title>
</head>

<body>


    <?php

    $lista = array("uno", "dos", "tres", "cuatro", "cinco");
    $lista2 = ["fruta", "verdura", "carne", "pescado", "lácteos"];

    echo "<ul>";
    foreach ($lista as $elemento) {
        echo "<li>$elemento</li>";
    }
    echo "</ul>";

    // funcionaes mas importantes para trabajar con arrays

    // count
    echo count($lista);

    //var_dump($lista);


    // array_push

    $fruits = ['manzana', 'banana'];


    echo "<ul>";
    foreach ($fruits as $elemento) {
        echo "<li>$elemento</li>";
    }
    echo "</ul>";


    array_push($fruits, 'naranja'); // ['manzana', 'banana', 'naranja']
    $fruits[] = 'kiwi'; // ['manzana', 'banana', 'naranja', 'kiwi']


    echo "<ul>";
    foreach ($fruits as $elemento) {
        echo "<li>$elemento</li>";
    }
    echo "</ul>";


    // Eliminar elementos:


    $lastFruit = array_pop($fruits); // 'kiwi', $fruits ahora tiene 3 elementos.
    $firstFruit = array_shift($fruits); // 'manzana', $fruits ahora tiene 2 elementos.

    unset($fruits[1]); // Elimina 'banana', $fruits ahora tiene 1 elemento.

    echo "<ul>";
    foreach ($fruits as $elemento) {
        echo "<li>$elemento</li>";
    }
    echo "</ul>";


    // Desestructuración
    list($first, $second) = $fruits;

    echo "<p>$second</p>";

    var_dump($fruits);



    ?>


</body>

</html>