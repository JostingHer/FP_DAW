<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar Producto - Mercado Sparking</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/form.css" />


    <style>
        .main__login {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            height: 100vw;
        }
    </style>
</head>


<body>
    <header class="header">
        <h1 class="header__title"><a href="?method=home">Coldección de IAS</a></h1>
        <ul class="header__nav">
            <li><a class="btn" href="?method=home">Inicio</a></li>
            <li><a class="btn" href="?method=addProduct">Agregar IAs</a></li>
            <li><a class="btn" href="?method=logout">Cerrar sesión</a></li>
        </ul>
    </header>
    <div class="container">
        <div class="container-main">

            <main>

                <div class="login__container-form login__container-form-product">

                    <form action="?method=editProduct" method="post" class="form">
                        <legend class="login__title">Actualizar IA con id <?php echo $iaUpdate->getId()   ?></legend>

                        <div class="form__field">
                            <label for="id">Id IA:</label>
                            <?php
                            echo '<input type="text" id="id" name="id" value=' . $iaUpdate->getId() . ' required />'
                            ?>
                        </div>


                        <div class="form__field">
                            <label for="name">Nombre IA:</label>
                            <?php
                            echo '<input type="text" id="name" name="name" value=' . $iaUpdate->getName() . ' required/>'
                            ?>
                        </div>

                        <div class="form__field">
                            <label for="company">Empresa:</label>

                            <?php
                            echo '<input type="text" id="company" name="company" value=' . $iaUpdate->getCompany() . ' required />'
                            ?>

                        </div>
                        <div class="form__field">
                            <label for="url">Sitio web oficial:</label>

                            <?php
                            echo '<input type="text" id="url" name="url" value=' . $iaUpdate->getUrl() . '  required />'
                            ?>

                        </div>
                        <div class="form__field">
                            <label for="year">Year:</label>
                            <?php
                            echo '<input type="number" min="1" name="year" id="year" value=' . $iaUpdate->getYearOfPublication() . ' required />'
                            ?>
                        </div>
                        <div class="form__field">
                            <label for="category">Categoria: </label>
                            <?php
                            echo '<input type="text" id="category" name="category" placeholder="Text/Images" value=' . $iaUpdate->getCategory() . ' required />'
                            ?>

                        </div>
                        <div class="form__field">
                            <label for="description">Descripción: </label>
                            <?php
                            echo '<input type="text" id="description" name="description" required value=' . $iaUpdate->getDescription() . ' />'
                            ?>

                        </div>
                        <div class="form__field">
                            <label for="price">Precio: </label>
                            <?php
                            echo '<input type="text" id="price" name="price" placeholder="Price/Paid" value=' . $iaUpdate->getPrice() . ' required />'
                            ?>

                        </div>

                        <input class="form__submit" type="submit" value="Actualizar IA" />


                    </form>


                </div>

            </main>
        </div>
    </div>
</body>

</html>