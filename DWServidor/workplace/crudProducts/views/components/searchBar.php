<form action="?method=new" method="post">
    <label for="">Agregar nuevos productos</label>
    <input type="text" name="products">
    <input type="submit">
</form>

<ul>
    <?php
    $products = json_decode($_COOKIE['products'], true);
    foreach ($products as $index => $product) {

        echo "<div class='flex'>";
        echo "<li>$index - $product</li>";
        echo "<a class='link__delete' href='?method=delete&index=$index'>X</a>";


        echo "<a class='link__delete' href='?method=edit&index=$index'>editar</a>";




        echo "</div>";
    }
    ?>
</ul>