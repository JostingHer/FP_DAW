<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=h1, initial-scale=1.0" />
    <title>Login Sparking</title>
    <link rel="stylesheet" href="./views/styles/normalize.css" />
    <link rel="stylesheet" href="./views/styles/style.css" />
    <link rel="stylesheet" href="./views/styles/form.css" />
    <link rel="stylesheet" href="./views/styles/sidebar.css" />


</head>

<body>


    <main class="main">
        <div class="main__login">

            <img class="login__img" src="./assets/logo.webp" alt="">
            <div class="login__container-form">


                <form action="?method=auth" method="post" class="form">
                    <legend class="login__title">Mercado Sparking</legend>

                    <div class="form__field">
                        <label for="gmail">Correo: </label>
                        <input type="email" id="gmail" name="gmail">
                    </div>

                    <div class="form__field">

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>




                    <input class="form__submit" type="submit" value="Registrarse">
                </form>

            </div>
        </div>

    </main>

</body>

</html>