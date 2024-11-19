export class Game {
    constructor(jugador1, jugador2) {
        this.jugador1 = jugador1;
        this.jugador2 = jugador2;
    }

    // Método para determinar el valor numérico de cada jugada de póker (de mayor a menor)
    valorMano(jugada) {
        const ranking = {
            "Escalera de color": 8,
            "Póker": 7,
            "Full": 6,
            "Color": 5,
            "Escalera": 4,
            "Trío": 3,
            "Doble pareja": 2,
            "Pareja": 1,
            "Carta alta": 0
        };
        return ranking[jugada] || 0;
    }

    // Método para determinar el ganador del juego
    determinarGanador() {
        const jugadaJugador1 = this.jugador1.evaluarJugada();
        const jugadaJugador2 = this.jugador2.evaluarJugada();

        const valorJugadaJugador1 = this.valorMano(jugadaJugador1);
        const valorJugadaJugador2 = this.valorMano(jugadaJugador2);

        console.log(`Jugada del Jugador 1: ${jugadaJugador1}`);
        console.log(`Jugada del Jugador 2: ${jugadaJugador2}`);

        if (valorJugadaJugador1 > valorJugadaJugador2) {
            return "El Jugador 1 gana con " + jugadaJugador1;
        } else if (valorJugadaJugador1 < valorJugadaJugador2) {
            return "El Jugador 2 gana con " + jugadaJugador2;
        } else {
            return "Es un empate con " + jugadaJugador1;
        }
    }
}
