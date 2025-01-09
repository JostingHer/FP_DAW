<?php

function ecusegundogrado($a, $b, $c)
{


  $formula1 = (-$b + sqrt($b * $b - 4 * $a * $c)) / (2 * $a);
  $formula2 = (-$b - sqrt($b * $b - 4 * $a * $c)) / (2 * $a);


  if (($b * $b - 4 * $a * $c) < 0) {
    $soluciones = false;
  } else {
    $soluciones = [];
    $soluciones[] = [$formula1];
    $soluciones[1] = [$formula2];
  }



  return $soluciones;
}

$soluciones = [];

$soluciones = ecusegundogrado(1, -3, 2);

foreach ($soluciones as $solucion) {
  echo "La solucion a esta ecuacion es " . $solucion[0] . "<br>";
}
