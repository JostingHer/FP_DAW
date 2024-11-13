export default class Carta {
    palo;
    valor;
    constructor(palo = null, valor = null) {
        this.palo = palo;
        this.valor = valor;
    }
    toString() {
        return `Carta: ${this.valor} de ${this.palo}`;
    }
    getPalo() {
        return this.palo;
    }
    getValor() {
        return this.valor;
    }
    setPalo(palo) {
        this.palo = palo;
    }
    setValor(valor) {
        this.valor = valor;
    }
}