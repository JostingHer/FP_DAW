<html>

<head>
    <title>Título</title>

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

h1{
    font-family: "Roboto", sans-serif;
    text-align: center;
    color:white;
}


        </style>
</head>

<body>
    <h1>Iniciar sesion</h1>
<div class="form">
    <div>
    <form action="?method=auth" method="post">
        <label for="correo">Correo electronico :</label>
        <br>
        <input type="text" name="correo"> 
        <br>
        <br>
        <label for="password">Contraseña :</label>
        <br>
        <input type="password" name="password"> <br>
        <br>
        <input type="submit" value="Iniciar sesion">
    </form>
    </div>
    </div>

    <p>
    <?php
            //enviar correo de inicio de sesion
            $message = "Se ha iniciado sesion en simply";
            $to=$_SESSION["correo"];
            $subject="Sesion iniciada";
            $from = 'emailrandom@gmail.com';
            $headers = "From:".$from;
            mail($to,$subject,$message, $headers);
   
    ?>
</p>

    <p>
    <?php
    if (isset($_SESSION['errorcorreo'])) {
        echo "<p style='color:red;'>Eso no es un correo válido.</p>";
        unset($_SESSION['errorcorreo']); 
    } else if (isset($_SESSION['errorcontraseña'])) {
        echo "<p style='color:red;'>La contraseña debe tener al menos 8 caracteres.</p>";
        unset($_SESSION['errorcontraseña']); 
    } else if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>Los campos no pueden estar vacíos.</p>";
        unset($_SESSION['error']); 
    }
    ?>
</p>
</body>

</html>