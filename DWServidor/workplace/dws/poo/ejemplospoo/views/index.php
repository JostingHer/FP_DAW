<html>

<head>
    <title>Título</title>
</head>

<body>
    <?php
    require('views/header.php');
    ?>
    <h1>Home de <?= $this->name ?></h1>
    <div>
        Estamos en el index
    </div>

    Me llamo <?= $this->student ?>
    <br>
    Estamos estudiando <?= $this->module ?> con el profesor <?= $this->teacher ?>
</body>

</html>