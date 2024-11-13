export default class Baraja {

    listaCartas;

    constructor(listaCartas = []) {
        this.listaCartas = barajar(listaCartas);
    }



    barajar() {
        this.listaCartas.sort(() => Math.random() - 0.5);
    }


    toString() {
        return `Baraja: ${this.listaCartas}`;
    }

    sacarCarta() {
        return this.listaCartas.pop();
    }


}