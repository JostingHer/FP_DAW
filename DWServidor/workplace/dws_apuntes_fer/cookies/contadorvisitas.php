<?php

if(!isset($_COOKIE["visitas"])){
    //El usuario se ha metido por primera vez
    setcookie("visitas","1",time()+ 3600*24);
    echo "Pagina visitada por primera vez";
}else{
    //El usuario se ha metido varias veces
    $visitas = (int)$_COOKIE["visitas"];
    $visitas++;
    setcookie("visitas",$visitas,time()+ 3600*24);
    echo"Pagina visitada " .$visitas." veces" ;
}


if(isset($_GET["boton"])){
    var_dump( $_COOKIE );
    setcookie("visitas","0",time()+ 3600*24);
    echo "Pagina visitada por primera vez";

}
?>


<html>

<head>



</head>


<body>

<form action="" method="get"> 

<input href="#" type="submit" value="Resetear" name="boton">

</form>




  


</body>


</html>