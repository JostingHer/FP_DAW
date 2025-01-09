<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi lista</title>
    <title>IAs</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/form.css" />
    <link rel="stylesheet" href="./styles/milista.css" />

    <style>
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 800px;
            margin: auto;
        }

        .contenedor {
            max-width: 800px;
            margin: auto;
        }

        .btn-back {
            text-align: center;
        }
    </style>

</head>

<body>



    <main class="contenedor container">

        <div class="grid">

            <form action="?method=insertar" method="post" class="form">
                <legend class="login__title">AÑADIR VIDEOJUEGO</legend>

                <div class="form__field">
                    <label for="id">ID VIDEOJUEGO</label>
                    <input type="text" id="id" name="id" placeholder="introduce el id" />
                </div>
                <div class="form__field">
                    <label for="clave">clave (opcional)</label>
                    <input type="text" id="clave" name="clave" placeholder="introduce la clave si la tiens" />
                </div>
                <?php
                if (isset($_SESSION['errorInsertar']) && $_SESSION['errorInsertar'] != '') {
                    echo "<p class='error'>{$_SESSION['errorInsertar']}</p>";
                }
                ?>

                <?php
                if (isset($_SESSION['exitoInsertar']) && $_SESSION['exitoInsertar'] != '') {
                    echo "<p class='sucess'>{$_SESSION['exitoInsertar']}</p>";
                }
                ?>

                <input class="form__submit" type="submit" value="Agregar" />

            </form>

            <form action="?method=eliminar" method="post" class="form">
                <legend class="login__title">ELIMINAR VIDEOJUEGO</legend>

                <div class="form__field">
                    <label for="id">ID VIDEOJUEGO</label>
                    <input type="text" id="id" name="id" placeholder="introduce el id" />
                </div>

                <?php
                if (isset($_SESSION['errorBorrar']) && $_SESSION['errorBorrar'] != '') {
                    echo "<p class='error'>{$_SESSION['errorBorrar']}</p>";
                }
                ?>

                <?php
                if (isset($_SESSION['exitoBorrar']) && $_SESSION['exitoBorrar'] != '') {
                    echo "<p class='sucess'>{$_SESSION['exitoBorrar']}</p>";
                }
                ?>

                <input class="form__submit" type="submit" value="eliminar" />


            </form>
        </div>
        <a class="btn btn-back" href="?method=home">Volver al Inicio</a>
    </main>



</body>

</html>