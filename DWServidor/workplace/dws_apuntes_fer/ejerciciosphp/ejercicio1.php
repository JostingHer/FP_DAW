<?php
$var = 8;
//devuelve el valor de una cadena si es string,integer etc
echo gettype($var);
echo "<br>";
$var1 = "2";
echo gettype($var);
//salto de linea
echo "<br>";
//operaciones aritmeticas basicas con los simbolos normales
$multi = $var * $var1;
echo "La multiplicacion da el resultado = $multi";
echo "<br>";
$var4 = "cris";
$var5 = "tiano";
//concatenar cadenas con punto
echo $var4 . $var5;
echo "<br>";

//if

if ($var < 8) {
    echo "la variable es menor que ocho";
} elseif ($var > 8) {
    echo "la variable es mayor que ocho";
} else {
    echo "la variable es igual a ocho";
};
