<html>
  <style>
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

<h1>Registrar Producto</h1>
<div class="form">
<form action="?method=RegistrarProducto" method="post">
  <label for="Producto">Producto</label><br>
  <input type="text" id="Producto" name="Producto" ><br>
  <label for="Stock">Stock</label><br>
  <input type="number" id="Stock" name="Stock" ><br><br>

  <label for="PrecioUni">Precio Unidad</label><br>
  <input type="number" step="0.01" id="PrecioUni" name="PrecioUni" ><br><br>

  <input type="submit" value="Registrar Producto">

</form> 
</div>

<a href="?method=home"><button>Volver</button></a>

    <?php

    if(isset($_COOKIE["DatosTabla"])){
      $lista = unserialize($_COOKIE["DatosTabla"]);
  //intentar que si el nombre de producto es el mismo y el stock es el mismo que el stock se sume al que ya estaba
      foreach ($lista as $producto) {
        foreach ($producto as $dato) {
          if($producto[0] == $_POST["Producto"] && $producto[2] == $_POST["PrecioUni"]){
            $nuevoPrecio=$_POST["Stock"];
            $producto[1] =  $producto[1]+ $nuevoPrecio;
          }
        }
    }
  }

    ?>




</body>
</html>