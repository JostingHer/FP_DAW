<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAs</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/milista.css" />
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="header__title"><a href="?method=home">VIDEOJUEGOS</a></h1>
            <ul class="header__nav">
                <li><a class="btn" href="?method=home">Inicio</a></li>
                <li><a class="btn" href="?method=milistaPage">Mi lista</a></li>
            </ul>
        </header>
        <main class="main">
            <table class="table-desktop">

                <thead class="table-desktop__head">
                    <tr>
                        <th>Nombre</th>
                        <th>Puntuacion</th>
                        <th>Compañia</th>
                    </tr>
                </thead>
                <tbody class="table-desktop__body">


                    <?php


                    foreach ($pages->videojuegos as $videojuego) {
                        echo "<tr>";
                        echo "<td>" . $videojuego->getNombre() . "</td>";
                        echo "<td>" . $videojuego->getPuntuacion() . "</td>";
                        echo "<td>" . $videojuego->getCodigo_desarrollador() . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>


        </main>
        <!-- paginacion -->
        <div class="paginacion">
            <?php
            for ($i = 1; $i <= $pages->n; $i++) {
                echo "<a class='link' href='?method=home&page=$i'>$i</a>";
            }
            ?>
        </div>


    </div>


</body>

</html>