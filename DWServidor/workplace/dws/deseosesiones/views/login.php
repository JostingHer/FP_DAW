<html>

<head>
    <title>Título</title>
</head>

<body>
    <?php
    
    ?>
    <h1>Login de <?= $this->name ?></h1>

    <form action="?method=auth" method="post">
        <label for="">nombre</label>
        <input type="text" name="name"> <br>
        <label for="">contraseña</label>
        <input type="password" name="password"> <br>
        <input type="submit">
    </form>
</body>

</html>