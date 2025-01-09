<!-- views/home.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Librería</title>
</head>

<body>
    <h1>Gestión de Librería</h1>
    <form method="GET" action="main.php">
        <select name="consulta">
            <option value="obtenerLibros">Ver Libros</option>
            <option value="obtenerAutores">Ver Autores</option>
            <option value="obtenerEditoriales">Ver Editoriales</option>
            <option value="obtenerCategorias">Ver Categorías</option>
        </select>
        <button type="submit">Consultar</button>
    </form>

    <?php if (!empty($this->resultado)): ?>
        <h2>Resultados</h2>
        <ul>
            <?php foreach ($this->resultado as $fila): ?>
                <li>
                    <?php
                    // Convertir cada fila en texto concatenado
                    echo implode(" - ", array_map('htmlspecialchars', $fila));
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>