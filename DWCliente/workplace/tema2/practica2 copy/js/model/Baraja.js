import { Carta } from './Carta.js';

export class Baraja {

    listaCartas;

    constructor() {
        this.listaCartas = this.crearDeck();
    }



    barajar() {
        this.listaCartas = this.listaCartas.sort(() => Math.random() - 0.5);
    }


    toString() {
        return `Baraja: ${this.listaCartas}`;
    }

    reparteCarta() {
        return this.listaCartas.pop();
    }

    crearDeck = () => {

        const palos = ['c', 'd', 'p', 't'];
        const cartas = [];
    
        // Crear las 52 cartas, agrupadas por palo
        for (const palo of palos) {
            for (let valor = 1; valor <= 13; valor++) {
                cartas.push(new Carta(palo, valor));
            }
        }

        return cartas;
    
    }


}