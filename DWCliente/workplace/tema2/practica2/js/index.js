import { Baraja, Jugador } from './model/index.js'

const baraja =  new Baraja();
baraja.barajar();
console.log(baraja.toString());

const jugador1 = new Jugador("Jugador 1", []);

console.log("el jugador1 uno no tiene cartas: ", jugador1.toString());

for(let i = 0; i < 5; i++){
    jugador1.pedirCarta(baraja.reparteCarta());
    
    console.log("cartas",  jugador1.toString())
}
console.log("cartas",  jugador1.toString());

console.log(jugador1)

console.log("jugada",  jugador1.evaluarJugada());