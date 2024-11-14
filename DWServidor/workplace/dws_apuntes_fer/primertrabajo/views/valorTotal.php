<html>
    <style>
        button{

font-family: "Roboto", sans-serif;
text-transform: uppercase;
outline: 0;
background: #4CAF50;
width: 100%;
border: 0;
padding: 15px;
color: #FFFFFF;
font-size: 14px;
-webkit-transition: all 0.3 ease;
transition: all 0.3 ease;
cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
background: #43A047;
}

h1,p{
  font-family: "Roboto", sans-serif;
  text-align: center;
  color:white;
}

body {
  background: #76b852; 
  background: rgb(141,194,111);
  background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
        </style>

<body>

<h1>Valor total de todos los productos del mercado</h1>

<form action="?method=ValorTotal" method="post">
</form> 


<?php
    if(isset($_COOKIE["DatosTabla"])){
       $lista = unserialize($_COOKIE["DatosTabla"]);

       $valor = 0;

       foreach ($lista as $producto) {
         foreach ($producto as $dato) {
            $valorTotal += $producto[1] * $producto[2] / 4; 
         }
     }
     //el dividido para 4 es porque se muestra 4 veces por los 4 elementos del array
     echo "<p>El valor total de mi mercado es ".$valorTotal."$ </p>"; 
 }
 
    ?>
<br>
<a href="?method=home"><button>Volver</button></a>

</body>
</html>