
## Comentarios del proyecto


### investigacion: Email no funciona

- **Descripción**: El proyecto no puede enviar correos electrónicos.
- he probado hacerlo con la funcion mail() y por ultimo he probado el PHPMailer que lo instale con composer por eso esta esos archivos y el directorio vendor (ignorarlos) y no se envia el correo
- No se si lo he configurado mal 
- He investigado y si esta bien configurado y no se llegan los correos es porque google email ha restringido el acceso a aplicaciones no seguras, esto siempre ha estado restirngido por defecto y lo podias cambiar, lo que pasa es que desde otoño de 2024 han quitado el poder cambiarlo.

Por ello no se puede, tambien se podria intentare con servicio de correo como es outlook o hotmail.
- o probar otra forma, en el articulo habla de la autenticacion con 0Auth


Articulo de referencia:
https://support.google.com/a/answer/6260879?hl=es 


### Excepciones 

- Si el correo no es valido
- Si la contraseña no es valida 
    - ya sea porque no cumple los requisitos minimos
    - o si la contraseña es de un usuario registrado y ha puesto una contraseña que no es

- la excepcion de paginas 404:

Esta seccion es bastante buena y le da mas seguridad a la pagina, ¿cuando salta?

- Cuando se intenta acceder a una ruta que no existe
- Cuando se intenta acceder a una ruta que no tiene permisos para acceder - usuario no logueado o no tiene permisos para acceder a esa ruta
- en lugar de mostrar el contenido de la ruta, muestra una pagina de error 404 con un mensaje de error y un enlace al login page

- digamos que estas en la pagina de login: dashboard/main.php
o has iniciado sesion y luego cerrado: dashboard/main.php?method=login

e intentas modificar la url sin iniciar sesion y pones: dashboard/main.php?method=home a mano
te saltar al pagina de error: dashboard/main.php?method=errorPage



### Aspectos a mejorar un  monton:

- no se envia el correo
- no me gusta nada la funcion authUser es muy grande, intente dividirla pero sigue siendo grande podria hacer dos una
 de auth y otra de login, pero se lee bien y sen entiende lo que quiero hace y lo que hace cada cosa con comentarios claros

- metodo buscar - filteredproductos deberia ser una varible de session

- agregar productos, se repiten los productos formas de solucionarlo
    - esto se complica debido a que los productos pueden repetirse el nombre pero el precio puede ser el mismo o no
    - lo arreglaria pues en lugar de guardar producto(nombre, precio, cantidad), guardaria nombre y un array de pedidos
    - en la tabla mostraria la cantidad suma de los pedidos y precio medio
    - tambien no poner el precio medio, si no poner una seccion nueva que sea pedidos del producto donde se muestre de donde sacan los datos de se producto


    - otra opcion seria una vez agregado el producto que no se vuelva agregar, y poner en la tabla
     dos input number de aumentar y disminuir cantidad, pero puede haber muchos problemas diferentes precios

    - yo haria la primera opcion, por tiempo no lo hare ahora.


- diseño es mejorable, sobre todo hacer que la pagina se vea bien en diferentes dispositivos es decir para distintos tamños de pantalla



PD: He desistalado el composer porque me instalaba muchas cosas y al final ni siquiera me funciono.

