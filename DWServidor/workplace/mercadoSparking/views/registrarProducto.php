<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=h1, initial-scale=1.0" />
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="../styles/normalize.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />


    <link rel="stylesheet" href="../styles/sidebar.css" />


</head>

<body>

    <?php
    require("../components/header.php")
    ?>



    <form action="?method=addProduct" method="post" class="form">

        <div class="form__field">
            <label for="name">Nuevo producto</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form__field">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="1">
        </div>
        <div class="form__field">
            <label for="pricing">Precio</label>
            <input type="number" name="pricing" id="pricing" min="1">
        </div>




        <input class="form__submit" type="submit" value="Agregar">
    </form>




</body>

</html>