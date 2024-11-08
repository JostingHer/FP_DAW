<?php
$listaPaises = [];
    $pais = array (
        "nombre" => "China",
        "poblacion" => "80000000000000000",
        "moneda" => "yuan"
    );

    $pais1 = array (
        "nombre" => "España",
        "poblacion" => "45000000",
        "moneda" => "euro"
    );

    $pais2 = array (
        "nombre" => "Andorra",
        "poblacion" => "4 ",
        "moneda" => "euro"
    );

    $listaPaises[] = $pais;    
    $listaPaises[] = $pais1;
    $listaPaises[] = $pais2;

    foreach($listaPaises as $paises){
        echo $paises["nombre"] ."<br>".$paises["poblacion"] ."<br>".$paises["moneda"]."<br>";
    }

    ;