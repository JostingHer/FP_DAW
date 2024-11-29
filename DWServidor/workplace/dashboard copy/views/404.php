<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
</head>

<body>


    <h1>404 <a href="?method=login">tocame para ir a login</a></h1>

    <?php

    throw new UnatherizedAccessException();

    echo $_SESSION['errorMessage404'];




    ?>

</body>

</html>