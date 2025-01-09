export class Carta {
    constructor(palo, valor) {
        // Validamos los datos al crear una carta
        if (this.esPaloValido(palo) && this.esValorValido(valor)) {
            this.palo = palo;
            this.valor = valor;
        } else {
            this.palo = null;
            this.valor = null;
        }
    }

    esPaloValido(palo) {
        // Solo se permiten los palos c (Corazones), d (Diamantes), p (Picas), t (Tréboles)
        return ['c', 'd', 'p', 't'].includes(palo);
    }

    esValorValido(valor) {
        // Solo se permiten valores entre 1 y 13
        return Number.isInteger(valor) && valor >= 1 && valor <= 13;
    }

    darValor(palo, valor) {
        // Método para asignar nuevo valor y palo, validando que sean correctos
        if (this.esPaloValido(palo) && this.esValorValido(valor)) {
            this.palo = palo;
            this.valor = valor;
        }
    }

    toStringUrlImg(){
        return `${this.palo}${this.valor}`;
    }

    toString() {
        // Nombres de los valores
        const nombresValores = {
            1: "As",
            11: "Jota",
            12: "Reina",
            13: "Rey"
        };
        const nombreValor = nombresValores[this.valor] || this.valor;

        // Nombres de los palos
        const nombresPalos = {
            c: "Corazones",
            d: "Diamantes",
            p: "Picas",
            t: "Tréboles"
        };
        const nombrePalo = nombresPalos[this.palo];

        // Retornar la representación en texto, si la carta es válida
        if (nombrePalo && nombreValor) {
            return `${nombreValor} de ${nombrePalo}`;
        } else {
            return "Carta inválida";
        }
    }
}
