<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login y Registro Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/form.css" />

  <style>
    .error {
      color: red;
      font-weight: bold;
      display: block;
    }
  </style>
</head>

<body>
  <div class="container-login">
    <main class="main">
      <div class="main__login">
        <img class="login__img" src="./assets/logo.webp" alt="logo" />
        <div class="login__container-form">


          <form id="loginForm" action="?method=authUser" method="post" class="form">
            <legend class="login__title">Mercado Sparking</legend>

            <div class="form__field">
              <label for="email">Correo: </label>
              <input type="text" id="email" name="email" />
              <p class="error"> <?php
                                if (isset($_SESSION['msjInvalidEmail'])) {
                                  echo $_SESSION['msjInvalidEmail'];
                                }

                                ?></p>
            </div>

            <div class="form__field">
              <label for="password">Contraseña: </label>
              <input type="password" name="password" id="password" />
              <p class="error">
                <?php
                if (isset($_SESSION['msjInvalidPassword'])) {
                  echo $_SESSION['msjInvalidPassword'];
                }
                ?>
              </p>
            </div>

            <input class="form__submit" type="submit" value="Iniciar sesión" />
          </form>



        </div>
      </div>
    </main>
  </div>


</body>

</html>