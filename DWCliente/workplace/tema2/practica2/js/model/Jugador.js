export class Jugador {
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
            console.log("tya tienes suficientes cart");
            return;
        }

        this.mano.push(carta);
    }

    // un toString para mostrar el nombre del jugador y las cartas que tiene

    toString() {
        return this.mano.map(carta => carta.toString()).join('\n');
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


    evaluarJugada() {
        if (this.mano.length !== 5) {
            return "La mano no está completa para evaluar una jugada de póker.";
        }

        const valores = this.mano.map(carta => carta.valor);
        const palos = this.mano.map(carta => carta.palo);

        const esColor = new Set(palos).size === 1;  // Todas las cartas son del mismo palo
        const valoresOrdenados = [...new Set(valores)].sort((a, b) => a - b);
        const esEscalera = valoresOrdenados.length === 5 && valoresOrdenados[4] - valoresOrdenados[0] === 4;

        // Comprobar combinaciones de cartas
        const conteoValores = valores.reduce((contador, valor) => {
            contador[valor] = (contador[valor] || 0) + 1;
            return contador;
        }, {});

        const valoresConteo = Object.values(conteoValores);

        if (esColor && esEscalera) return "Escalera de color";
        if (valoresConteo.includes(4)) return "Póker";
        if (valoresConteo.includes(3) && valoresConteo.includes(2)) return "Full";
        if (esColor) return "Color";
        if (esEscalera) return "Escalera";
        if (valoresConteo.includes(3)) return "Trío";
        if (valoresConteo.filter(x => x === 2).length === 2) return "Doble pareja";
        if (valoresConteo.includes(2)) return "Pareja";

        return "Carta alta";
    }
    

    
}
