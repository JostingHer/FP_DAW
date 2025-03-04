

/**
* Función que formatea los datos del usuario aleatorio en un elemento div
* @param {Element} capaUsuario Elemento div en el que se graba el usuario
* @param {JSON} usuario El usuario que contiene los datos obtenidos de randomuser.me
*/
function rellenaUsuario(capaUsuario, usuario) {
	let foto = usuario.picture.large;
	let mail = usuario.email;
	let nombre = usuario.name.first;
	let apellido = usuario.name.last;
	let calle = usuario.location.street;
	let ciudad = usuario.location.city;
	let estado = usuario.location.state;
	capaUsuario.innerHTML = `<figure><img src="${foto}" alt="foto"></figure>` +
		`<p>${nombre} ${apellido}</p>` +
		`<p>${mail}</p>` +
		`<p>${calle.number} ${calle.name}</p>` +
		`<p>${ciudad}, (${estado})</p>` +
		`<p><button>Cambiar</button></p>`;
}

/**
* Captura el clic de botón en una capa de usuario
* @param {Element} capaUsuario Elemento div que contiene los datos a cambiar del usuario
*/
function generarEventoBoton(capaUsuario) {
	//asignamos evento al botón
	let boton = capaUsuario.querySelector("button" );
	boton.addEventListener("click", (ev) => {
		//mensaje de espera que desaparece cuando se cargan los datos
		capaUsuario.textContent = "Esperando usuario nuevo...";
		
		//hacemos petición de 1 usuario aleatorio nuevo
		fetch("https://randomuser.me/api")
			.then(resp => resp.json())
			.then(data => {
				let usuario = data.results[0];
				
				//modificamos los datos de la capa actual
				rellenaUsuario(capaUsuario, usuario);
				
				//programamos de nuevo el click del botón que cambia el usuario
				generarEventoBoton(capaUsuario);
			})
			.catch(error=>{
				capaUsuario.innerHTML = `<p class="error">${error}</p>` +
				`<p><button>Intentar de nuevo</button></p>`;
			});
	})
}

/**
* Código principal
*/
var main = document.querySelector("main");
main.textContent = "Cargando...";

//Petición de los 10 usuarios
fetch('https://randomuser.me/api/?results=10')
	.then((resp) => resp.json())
	.then(data => {
		let datos = data.results;

		main.textContent = "";
		for(let usuario of datos) {
			//generamos el HTML de cada capa con datos de usuario
			let divUsuario = document.createElement("div");
			rellenaUsuario(divUsuario, usuario);
			
			//programamos el click del botón que cambia el usuario
			generarEventoBoton(divUsuario);
			
			//añadimos la nueva capa a main
			main.appendChild(divUsuario);
		}
	})
	.catch(error=>{
		main.innerHTML = `<p class="error">${error}</p>`;
	});