<html>

<head>
    <style>
      body {
        background-color: #91cf88;
    font-family: Arial, Helvetica, sans-serif;
    
}

nav {
  text-align:center;
  border: 1px;
    background-color: green;
    color: white;
    padding: 6px;
    font-family: Arial, Helvetica, sans-serif;
}

a{
        text-decoration: none;
            color: white;
            font-size: 20px;
}


h1 {
  text-align:center;
    background-color: green;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

table, tr{
  border:1px solid black;
  text-align: left;
}
td{
  text-align: left;
}

header{
  border: 1px;
    background-color: green;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

#enlace{
  text-align:right;
  color:white;
}

#borrartabla{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 15%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
#borrartabla button:hover,.form button:active,.form button:focus {
  background: #43A047;
}

#Producto {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#Producto td, #Producto th {
  border: 1px solid #ddd;
  padding: 8px;
}


#Producto th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #448756;
  color: white;
}



    </style>
   
</head>

<body>
    <header>
    <h1>GREENHOUSE</h1>
    <a id="enlace" href="?method=close">Cerrar sesion</a>
    <nav>
    <a href="?method=RegistrarProducto">Registrar Producto |</a> 
    <a href="?method=BuscarProducto">Buscar Producto |</a> 
    <a href="?method=ValorTotal">Valor total</a> 
    </nav>
    </header>

    <h1>Tabla de inventario</h1>
    <table style="width:100%" id="Producto">
  <tr>
    <th>Precio</th>
    <th>Stock</th>
    <th>Precio Unidad</th>
    <th>Añadido por</th>
    <th>Acciones</th>
  </tr>
  <tr>
    <?php
     if(isset($_COOKIE["DatosTabla"])){
        $lista = unserialize($_COOKIE["DatosTabla"]);

        foreach ($lista as $producto) {
          echo "<tr>";
          foreach ($producto as $dato) {
              echo "<td>" . $dato . '</td>'; 
          }
            echo "<td><a><button>Eliminar</button></a></td>"; 
          echo "</tr>";
      }
  }
    ?>
    </tr>
</table>

<a href="?method=eliminarTabla"><button id="borrartabla">Borrar toda la tabla</button></a>

<br>
<br>
<br>
<form action="?method=eliminarElemento" method="post">
<label for="ProductoElim">Producto a Eliminar :</label><br>
  <input type="text" id="ProductoElim" name="ProductoElim" >
  <br>
  <br>
  <input type="submit" value="Eliminar Producto">

</form>
<?php
      if (isset($_POST["NombreProducto"])) {
        if ($_POST['NombreProducto'] != "") {
    if(isset($_COOKIE["DatosTabla"])){
      $lista = unserialize($_COOKIE["DatosTabla"]);

      foreach ($lista as $producto) {
        foreach ($producto as $dato) {
          if($producto[0] == $_POST["NombreProducto"]){
            //intento eliminar elemento
          }
        }
    }

  }
}
}

    ?>


 


</body>

</html>