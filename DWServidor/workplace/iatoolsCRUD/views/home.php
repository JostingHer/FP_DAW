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
                echo "<a class='link' href='?page=$i'>$i</a>";
            }
            ?>
        </div>

    </div>


</body>

</html>