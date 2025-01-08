Claro, aquí tienes el contenido reordenado y formateado de manera clara en formato **Markdown**:

---

## Comentarios del Proyecto

### Investigación: El email no funciona

- **Descripción**: El proyecto no puede enviar correos electrónicos.
- He probado con la función `mail()` y luego intenté usar PHPMailer, que instalé con Composer. Sin embargo, no se envían los correos.
- No sé si lo he configurado mal. He investigado y parece que está bien configurado, pero los correos no llegan porque Google ha restringido el acceso a aplicaciones no seguras. Este acceso siempre estuvo restringido por defecto, pero anteriormente se podía cambiar. Desde el otoño de 2024, han eliminado la opción para modificarlo.
  
  Por lo tanto, no se puede enviar correos de esta manera. Como alternativa, podría intentar con otros servicios de correo como Outlook o Hotmail, o utilizar la autenticación con OAuth.

- **Artículo de referencia**: [Google Support](https://support.google.com/a/answer/6260879?hl=es)

---

### Excepciones

1. **Correo no válido**: Cuando el correo proporcionado no cumple con el formato esperado.
2. **Contraseña no válida**: Esto puede ocurrir debido a:
   - No cumplir con los requisitos mínimos de seguridad.
   - La contraseña proporcionada es incorrecta para el usuario registrado.
3. OJO: TE VA A GUSTAR **Excepciones de página 404**:
   - Esta sección mejora la seguridad del proyecto al manejar errores de rutas no válidas. Las excepciones 404 pueden ocurrir en los siguientes casos:
     - Cuando se intenta acceder a una ruta que no existe.
     - Cuando un usuario no autenticado intenta acceder a una ruta restringida.

   - En lugar de mostrar el contenido de la ruta, se redirige a una página de error 404 con un mensaje de error y un enlace al **login**.

   - **Escenario**: Si estás en la página de login (`dashboard/main.php`) o ya has iniciado sesión y luego cerrado la sesión (`dashboard/main.php?method=login`), y luego intentas modificar la URL manualmente a una ruta que no existe o a una ruta no permitida (por ejemplo, `dashboard/main.php?method=home`), serás redirigido a la página de error: `dashboard/main.php?method=errorPage`.

---

### Aspectos a mejorar

1. **No se envía el correo**: Aún no se ha resuelto el problema con el envío de correos electrónicos.
2. **Función `authUser`**: La función `authUser` es muy grande. Intenté dividirla, pero sigue siendo extensa. Podría crear dos funciones separadas: una para la autenticación (`auth`) y otra para el login (`login`). Sin embargo, la función actual es comprensible y clara gracias a los comentarios que explican cada parte del proceso.
3. **Método `buscar - filteredproductos`**: Este método debería ser una variable de sesión para mejorar la persistencia de los filtros aplicados en la búsqueda de productos.
4. **Agregar productos repetidos**: Actualmente, los productos se pueden agregar varias veces con el mismo nombre pero diferente precio, lo que genera redundancia.
   
   - **Posibles soluciones**:
     - Una solución sería, en lugar de guardar solo el nombre, guardar el nombre y un array de pedidos con los diferentes precios.
     - En la tabla de productos, mostrar la cantidad total de cada producto y el precio medio.
     - Alternativamente, no mostrar el precio medio, sino crear una sección adicional donde se detallen los pedidos de cada producto (incluyendo la fuente de cada precio).
     - Otra opción sería evitar agregar el producto más de una vez, y permitir solo la modificación de la cantidad. Sin embargo, esto podría generar problemas si los productos tienen precios diferentes.

   **Mi opción preferida** sería la primera solución (guardar nombre y array de pedidos), pero por tiempo no la implementaré ahora.

5. **Diseño**: El diseño es mejorable. Es importante que la página se vea bien en dispositivos con distintos tamaños de pantalla, por lo que se debe mejorar la adaptabilidad (diseño responsive).

---

### Nota

- Desinstalé Composer porque instalaba muchas dependencias que al final no eran útiles y no solucionaban el problema.

---

Este es el contenido estructurado de manera más clara y ordenada. Los comentarios están formateados en listas y subtítulos para facilitar la lectura y comprensión.