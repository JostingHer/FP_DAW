<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Calculadora</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/form.css" />
</head>

<body>



    <header class="header">
        <h1 class="header__title"><a href="?method=cookies">EJERCICIO COOKIES</a></h1>
        <ul class="header__nav">
            <li><a href="?method=arrays">ejercicio arrays</a></li>
            <li><a href="?method=cookies">ejercicio cookies</a></li>
            <li><a href="?method=ficheros">ejercicio ficheros</a></li>
        </ul>
    </header>

    <main>

        <div class="login__container-form login__container-form-product">
            <form action="?method=addProduct" method="post" class="form">
                <legend class="login__title">Agregar Producto</legend>

                <div class="form__field">
                    <label for="name">Nombre del producto:</label>
                    <input type="text" id="name" name="name" required />
                </div>

                <input class="form__submit" type="submit" value="Agregar producto" />
            </form>

            <form action="?method=showProducts" method="post" class="form">
                <input class="form__submit" type="submit" value="Mostrar productos" />
            </form>
        </div>
        <!-- mostrar resultados -->
        <?php
        if (!empty($products)) {
            echo "<ol>";
            foreach ($products as $product) {
                echo "<li>$product</li>";
            }
            echo "</ol>";
        }
        ?>



    </main>
</body>

</html>