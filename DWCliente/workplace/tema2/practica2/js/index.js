import { Baraja, Jugador, Game } from './model/index.js'

const baraja =  new Baraja();
baraja.barajar();

const jugador1 = new Jugador("Jugador 1", []);
const jugador2 = new Jugador("Jugador 2", []);


for(let i = 0; i < 5; i++){
    jugador1.pedirCarta(baraja.reparteCarta());
    jugador2.pedirCarta(baraja.reparteCarta());
    
}
console.log("cartas",  jugador1.toString());
console.log("cartas",  jugador2.toString());


console.log("jugador1",  jugador1.evaluarJugada());
console.log("jugador2",  jugador2.evaluarJugada());


const crearCartaHTML = (carta) => {

    const imgCarta = document.createElement('img');
        imgCarta.src = `assets/cartas/${ carta }.svg`; //3H, JD
        imgCarta.classList.add('card');

    return imgCarta;
}

const game = new Game(jugador1, jugador2);

console.log(game.determinarGanador());



const initApp = document.querySelector('#start');
const containerCardPlayer = document.querySelector('#container-cards-player');
const containerCardComputer = document.querySelector('#container-cards-computer');


// iniciar app

initApp.addEventListener("click", () => {

   
    const cardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    const cardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

})

