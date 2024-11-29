<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAs</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="header__title"><a href="?method=home">Colección de IAS</a></h1>
            <ul class="header__nav">
                <li><a class="btn" href="?method=home">Inicio</a></li>
                <li><a class="btn" href="?method=addProduct">Agregar IAs</a></li>
                <li><a class="btn" href="?method=logout">Cerrar sesión</a></li>
            </ul>
        </header>
        <main class="main-table">
            <table class="table-desktop">

                <thead class="table-desktop__head">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>URL</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-desktop__body">


                    <?php


                    foreach ($pages->tools as $ia) {
                        echo "<tr>";
                        echo "<td>" . $ia->getId() . "</td>";
                        echo "<td>" . $ia->getName() . "</td>";
                        echo "<td>" . $ia->getCompany() . "</td>";
                        echo "<td>" . $ia->getUrl() . "</td>";
                        echo "<td>" . $ia->getYearOfPublication() . "</td>";
                        echo "<td>" . $ia->getCategory() . "</td>";
                        echo "<td><a class='btn' href='?method=updateProduct&id=" . $ia->getId() . "'>Edit</a> <a class='btn btn-delete' href='?method=deleteProduct&id=" . $ia->getId() . "'>Delete</a></td>";
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
                $query = http_build_query(array_merge($_GET, ['page' => $i]));
                echo "<a class='link' href='?$query'>$i</a>";
            }
            ?>
        </div>


    </div>


</body>

</html>