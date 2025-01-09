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
                <div class="login__container-form">


                    <form id="loginForm" action="?method=authDefinitivo" method="post" class="form">
                        <legend class="login__title">IACRUD</legend>

                        <div class="form__field">
                            <label for="name">Name: </label>
                            <input type="text" id="name" name="name" />

                        </div>

                        <div class="form__field">
                            <label for="password">Contraseña: </label>
                            <input type="password" name="password" id="password" />
                            <p class="error">
                                <?php
                                if (isset($_SESSION['claveIncorrecta'])) {
                                    echo $_SESSION['claveIncorrecta'];
                                }
                                ?>
                            </p>
                        </div>

                        <p class="error">
                            <?php
                            if (isset($_SESSION['camposVacios'])) {
                                echo $_SESSION['camposVacios'];
                            }

                            ?>
                        </p>

                        <input class="form__submit" type="submit" value="Iniciar sesión" />
                    </form>



                </div>
            </div>
        </main>
    </div>


</body>

</html>