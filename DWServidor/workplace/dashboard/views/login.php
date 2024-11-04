<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login y Registro Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/form.css" />
  <style>
    .hidden {
      display: none;
    }

    .button {
      display: inline-block;
      padding: 10px 15px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      /* Verde */
      color: white;
      cursor: pointer;
      text-align: center;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container-login">
    <main class="main">
      <div class="main__login">
        <img class="login__img" src="./assets/logo.webp" alt="logo" />
        <div class="login__container-form">

          <!-- Botones para alternar entre Login y Registro -->
          <div>
            <button id="loginButton" class="button" onclick="showLogin()">Iniciar sesión</button>
            <button id="registerButton" class="button" onclick="showRegister()">Registrar</button>
          </div>

          <!-- Formulario de Login -->
          <form id="loginForm" action="?method=auth" method="post" class="form">
            <legend class="login__title">Mercado Sparking</legend>

            <div class="form__field">
              <label for="email">Correo: </label>
              <input type="email" id="email" name="email" required />
            </div>

            <div class="form__field">
              <label for="password">Contraseña: </label>
              <input type="password" name="password" id="password" required />
            </div>

            <input class="form__submit" type="submit" value="Iniciar sesión" />
          </form>

          <!-- Formulario de Registro -->
          <form id="registerForm" action="?method=registerUser" method="post" class="form hidden">
            <legend class="login__title">Registro</legend>

            <div class="form__field">
              <label for="registerEmail">Correo: </label>
              <input type="email" id="registerEmail" name="email" required />
            </div>

            <div class="form__field">
              <label for="registerPassword">Contraseña: </label>
              <input type="password" name="password" id="registerPassword" required />
            </div>

            <input class="form__submit" type="submit" value="Registrar" />
          </form>

          <?php
          // Mostrar mensajes de error o éxito
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
              echo '<p style="color:red;">Credenciales incorrectas.</p>';
            } elseif ($_GET['error'] == 2) {
              echo '<p style="color:red;">Por favor, completa todos los campos.</p>';
            } elseif ($_GET['error'] == 3) {
              echo '<p style="color:red;">El usuario ya está registrado.</p>';
            }
          } elseif (isset($_GET['registered'])) {
            echo '<p style="color:green;">Registro completado con éxito. Inicia sesión.</p>';
          }
          ?>
        </div>
      </div>
    </main>
  </div>

  <script>
    function showLogin() {
      document.getElementById('loginForm').classList.remove('hidden');
      document.getElementById('registerForm').classList.add('hidden');
    }

    function showRegister() {
      document.getElementById('loginForm').classList.add('hidden');
      document.getElementById('registerForm').classList.remove('hidden');
    }
  </script>
</body>

</html>