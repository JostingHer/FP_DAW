Ejercicio 1. Usando AJAX crea una página que, al pulsar un botón, lo transforme en un texto contenido en el fichero holaMundo.txt (por ejemplo “Hola mundo. Me llamo xxxx xxxxx xxxx”)

Texto botón: “Cambia el contenido”
Texto nuevo (quita el botón, por ejemplo con innerHTML): “Hola mundo. Me llamo xxxx xxxxx xxxx” obtenido con AJAX.


Ejercicio 2. Crear un documento JSON:

El documento JSON debe contener una lista de actividades con los siguientes datos por cada actividad:

Nombre de la actividad, por ejemplo: step, gbody, gap, boxeo.
Descripción de la actividad.
Tipo, por ejemplo: cuerpo-mente, tono-fuerza, box, baile.
Duración de la sesión.
Calorías
Beneficios, por ejemplo: Movilidad articular, control postural, tonificación, fuerza, resistencia general o coordinación.
Tipo de ejercicio, por ejemplo: Movilidad articular, elasticidad muscular, Cardiovascular, tonificación.
Accede al documento mediante AJAX. Crea una tabla con html y, utilizando JavaScript, rellena las filas con la información obtenida.



Ejercicio 3. Crear una página web compuesta de un campo de entrada para buscar cierto texto, dos botones ("Anterior" y "Siguiente") y un cuadro central para mostrar información.

La página mostrará el resultado de la búsqueda del texto en los títulos de los artículos mediante una petición a la API de noticias espaciales, sacará la primera noticia en el cuadro central y mediante los botones de anterior y siguiente deberá permitir cambiar de noticia. De las noticias debe aparecer:

Título 
La imagen asociada
URL a la noticia
Dirección API: https://spaceflightnewsapi.net/



Ejercicio 4.

La página https://randomuser.me/ permite obtener datos aleatorios de personas para que los desarrolladores y otros profesionales puedan utilizarlos en sus pruebas y tests. Las instrucciones de la API de este servicio gratuito están en la URL: https://randomuser.me/documentation

En todo caso la idea es hacer peticiones vía GET a la URL: https://randomuser.me/api/

Se pueden pasar parámetros para indicar cuántos usuarios aleatorios deseamos, el sexo, política de contraseñas, páginas, formato de respuesta, etc. En la página de documentación viene un ejemplo de la estructura JSON de las respuestas. Resumiendo, es un objeto formado por dos propiedades: results e info. La primera es un array donde cada elemento lo forma un objeto con los datos del usuario aleatorio. La propiedad info contiene otros detalles: una semilla, que permite obtener una petición con los mismos datos siempre, y los datos de paginación.

Nuestra aplicación en JavaScript mostrará información de 10 usuarios: foto, nombre, apellido, email, dirección y estado al que perte­nece cada usuario.

Mostraremos esos usuarios en dos filas. Distinguiremos el fondo de los pares e impares y, ade­más, en cada usuario colocaremos un botón con el texto "Cambiar". Cuando hagamos clic en el botón "Cambiar", el usuario en el que está situado el botón, se cambiará.

Mostraremos el mensaje "Cargando..." al principio, mientras llegan los datos de los 10 usua­rios (cuando lleguen, se quita el mensaje). También cuando pulsemos "Cambiar" en el usuario a modificar, escribiremos "Esperado usuario nuevo..." en la celda de ese usuario (habremos antes quitado los datos del usuario) hasta que lleguen los nuevos datos.