export default class Jugador {
    nombre;
    mano;

    constructor(nombre = "nombre por defecto", mano = []) {
        this.nombre = nombre;
        this.mano = mano;
    }

    // metodo de pedir carta
    pedirCarta(carta) {
        // maximo 5 cartas
        if(this.mano >=5){
            return;
        }

        this.mano.push(carta);
    }

    // un toString para mostrar el nombre del jugador y las cartas que tiene

    toString() {
        return `Jugador: ${this.nombre} Cartas: ${this.mano}`;
    }


    getNombre() {
        return this.nombre;
    }
    getMano() {
        return this.mano;
    }

    setNombre(nombre) {
        this.nombre = nombre;
    }

    setMano(){
        this.mano = mano;
    }
    

    
}
