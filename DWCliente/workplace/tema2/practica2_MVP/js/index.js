



const initApp = document.querySelector('#start');

const initAppTrio = document.querySelector('#trioMove');
const initAppPoker = document.querySelector('#pokerMove');
const initAppEscalera = document.querySelector('#escaleraMove');
const initAppColor = document.querySelector('#colorMove');
const initAppFull = document.querySelector('#fullMove');
const initAppEscaleraColor = document.querySelector('#escaleraColorMove');


  

const containerCardPlayer = document.querySelector('#container-cards-player');
const containerCardComputer = document.querySelector('#container-cards-computer');

const resultPlayer = document.querySelector('#result-player');
const resultComputer= document.querySelector('#result-computer');
const resultGame = document.querySelector('#Result-game');


const crearCartaHTML = (carta) => {

    const imgCarta = document.createElement('img');
        imgCarta.src = `assets/cartas/${ carta }.svg`; //3H, JD
        imgCarta.classList.add('card');

    return imgCarta;
}
// iniciar app

initApp.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);


    for(consti = 0; i < 5; i++){
        jugador1.pedirCarta(baraja.reparteCarta());
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }
    console.log("hola auto",jugador1)

    // console.log("cartas",  jugador1.toString());
    // console.log("cartas",  jugador2.toString());


    // console.log("jugador1",  jugador1.evaluarJugada());
    // console.log("jugador2",  jugador2.evaluarJugada());



  //console.log(jugador1.getMano())
   const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());





    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   

})

initAppTrio.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('d', 1);
    constcarta3 = new Carta('p', 1);
    constcarta4 = new Carta('t', 2);
    constcarta5 = new Carta('c', 3);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];

    //console.log("hola auto",jugador1)



    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }




  //console.log(jugador1.getMano())
   const game = new Game(jugador1, jugador2);

   console.log(game.determinarGanador());

    
    
   containerCardPlayer.innerHTML = "";
   containerCardComputer.innerHTML = "";
   resultGame.innerHTML = "";
 
  
   constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
   constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

   cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
   cardsComputer.forEach(card => containerCardComputer.appendChild(card));

   resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
   resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
   resultGame.textContent = game.determinarGanador();
  

})

initAppPoker.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('d', 1);
    constcarta3 = new Carta('p', 1);
    constcarta4 = new Carta('t', 1);
    constcarta5 = new Carta('c', 2);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];


    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }

    const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());
 
  
    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   
   

})


initAppEscalera.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('d', 2);
    constcarta3 = new Carta('p', 3);
    constcarta4 = new Carta('t', 4);
    constcarta5 = new Carta('c', 5);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];


    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }
    const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());
 
    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   
   

})

initAppColor.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('c', 2);
    constcarta3 = new Carta('c', 8);
    constcarta4 = new Carta('c', 7);
    constcarta5 = new Carta('c', 5);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];


    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }
   


    const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());
 

    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   

})


initAppFull.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('d', 1);
    constcarta3 = new Carta('p', 1);
    constcarta4 = new Carta('t', 2);
    constcarta5 = new Carta('c', 2);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];


    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }
    const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());
 
    
    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   
   

})

initAppEscaleraColor.addEventListener("click", () => {
    const baraja =  new Baraja();
    baraja.barajar();

    constjugador1 = new Jugador("Jugador 1", []);
    constjugador2 = new Jugador("Computadora", []);

    constcarta1 = new Carta('c', 1);
    constcarta2 = new Carta('c', 2);
    constcarta3 = new Carta('c', 3);
    constcarta4 = new Carta('c', 4);
    constcarta5 = new Carta('c', 5);

    jugador1.mano = [carta1, carta2, carta3, carta4, carta5];


    for(consti = 0; i < 5; i++){
        jugador2.pedirCarta(baraja.reparteCarta());
        
    }
     
    const game = new Game(jugador1, jugador2);

    console.log(game.determinarGanador());
 
    
    containerCardPlayer.innerHTML = "";
    containerCardComputer.innerHTML = "";
    resultGame.innerHTML = "";
  
   
    constcardsPlayer = jugador1.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));
    constcardsComputer = jugador2.mano.map(carta => crearCartaHTML(carta.toStringUrlImg()));

    cardsPlayer.forEach(card => containerCardPlayer.appendChild(card));
    cardsComputer.forEach(card => containerCardComputer.appendChild(card));

    resultPlayer.textContent = `Mano: ${jugador1.evaluarJugada()}`;
    resultComputer.textContent = `Mano: ${jugador2.evaluarJugada()}`;
    resultGame.textContent = game.determinarGanador();
   

})


