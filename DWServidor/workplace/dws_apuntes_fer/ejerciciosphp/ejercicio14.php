<?php

$cadena="sometemos";
$cadenadev="";


$cadenadev = strrev($cadena);

if($cadena == $cadenadev){
    echo "la palabra es palindromo";

}else{
    echo "la palabra no es palindromo";
}