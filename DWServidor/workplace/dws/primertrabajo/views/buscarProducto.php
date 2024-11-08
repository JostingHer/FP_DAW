<html>
  <style>

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

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form input[type="submit"] {
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

body {
  background: #76b852; /* fallback for old browsers */
  background: rgb(141,194,111);
  background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
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

h1{
    font-family: "Roboto", sans-serif;
    text-align: center;
    color:white;
}


  </style>
<body>

<h1>Buscar Producto</h1>
<div class="form">
<form action="?method=BuscarProducto" method="post">
  <label for="NombreProducto">Producto</label><br>
  <input type="text" id="NombreProducto" name="NombreProducto" ><br>
  <input type="submit" value="Buscar Producto">
</form> 
</div>

<a href="?method=home"><button>Volver</button></a>

<table style="width:100%" id="Producto">
 
  <tr>
    <?php
    try {
      if (isset($_POST["NombreProducto"])) {
        if ($_POST['NombreProducto'] != "") {
    if(isset($_COOKIE["DatosTabla"])){
      $lista = unserialize($_COOKIE["DatosTabla"]);
      
      echo "<tr>
      <th>Producto</th>
      <th>Stock</th>
      <th>Precio Unidad</th>
       <th>Añadido por</th>
    </tr>";

      foreach ($lista as $producto) {
        echo "<tr>";
        foreach ($producto as $dato) {
          if($producto[0] == $_POST["NombreProducto"]){
            echo "<td>" . $dato . '</td>'; 
          }
        }
    }
                throw new Productonoencontrado("Producto no encontrado"); 
    echo "</tr>";
  }
}
}
} catch(Productonoencontrado $c) {
  echo $c->errorMessage();
} 

    ?>
    </tr>
</table>

</body>
</html>