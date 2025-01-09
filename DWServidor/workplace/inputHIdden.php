<!--Crea una lista usando etiquetas ul y li. 
La lista inicialmente estará vacía pero un formulario con un 
input servirá para añadir los elementos. Usa input de 
tipo hiddens para que no "olvidar" los elementos ya añadidos a la lista. -->

<?php

//Se puede usar el método GET de la misma manera que el POST.
//Si el usuario no ha enviado ningún elmento, crea una lista vacía
//Si el usuario ya ha metido elementos por web, los obtiene de los elementos input hidden
if (isset($_POST['elementosPasados'])) {

    $lista = $_POST['elementosPasados'];
} else {
    $lista = [];
}
//Introduzco en la lista el nuevo elemento que el usuario acaba de escribir
if (isset($_POST['elemento'])) {

    $lista[] = $_POST['elemento'];
}
?>

<html>

<head>
    <title>Ejercicio de formulario</title>
</head>

<body>
    <form action="" method="post">
        <label for="elemento">Elemento a listar:</label><br>
        <input type="text" name="elemento" value=""><br>

        <?php

        //Creo una etiqueta input hidden por cada elemento que quiero guardar
        foreach ($lista as $elemento) {
            echo '<input type="hidden" name="elementosPasados[]" value="' . $elemento . '"><br>';
        }

        ?>

        <input type="submit" value="Enviar">
    </form>
    <ul>
        <?php
        //Listo los elementos por pantalla uno a uno
        foreach ($lista as $elemento) {
            echo "<li>$elemento</li>";
        }
        ?>

    </ul>
</body>

</html>