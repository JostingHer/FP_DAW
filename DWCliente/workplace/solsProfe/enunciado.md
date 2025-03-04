Ejercicio 1

Apartado a) Escribe una función que reciba un número en milisegundos y que cree una promesa que ejecute un temporizador. Cuando se cumpla la promesa con éxito al transcurrir dichos milisegundos se pasará el texto "Tiempo concluido". La función devolverá la promesa creada.

• La función no deberá escribir "Tiempo concluido", sino generar una promesa cuyo resultado es dicho texto.



Apartado b) Crea la función cuenta(). Esta función será capaz de escribir una cuenta atrás que deberá utilizar la función del apartado anterior y mostrarla en un elemento de HTML. Los parámetros de la función son:

* El número con el que se inicia la cuenta atrás.

* El elemento en el que escribiremos la cuenta atrás. Por defecto usará el elemento body.

* El intervalo en milisegundos en el que cambia cada número. Por defecto valdrá 1000.

* Una función callback, cuyo código se ejecuta cuando la cuenta finalice.



Apartado c) Crea, además, una página web que actualice dos párrafos utilizando la función del apartado anterior.

En el primero se mostrará la cuenta atrás desde el 6, pasando de segundo en segundo. 

En el segundo se contará desde el 60 pero cada número pasará de décima en décima. 

Además, al llegar a cero, queremos que escriba "Fin".



Ejercicio 2

Ejecuta el siguiente código de JavaScript:

var a = 0;
var b = 0;

var promesa1 = new Promise(function(resolver, rechazar){
	setTimeout(() => {
		for(let i=0; i < 1000000000; i++) {
			a++;
		}

		resolver(a);
		rechazar("Algo falló");
	}, 0);
});

var promesa2 = new Promise(function(resolver, rechazar){
	setTimeout(() => {
		for(let i=0; i < 1000000000; i++) {
			b++;
		}

		resolver(b);
		rechazar("Algo falló");
	}, 0);
});

promesa1.then((resultado) => console.log("a: " + resultado));
promesa2.then((resultado) => console.log("b: " + resultado));
console.log("a+b: " + (a+b));

¿Qué observas? Añade nuevo código para que el resultado de a+b mostrado en consola sea el que se obtendría utilizando programación síncrona (2000000000) mediante:

Apartado a) async/await

Apartado b) Promise.all()