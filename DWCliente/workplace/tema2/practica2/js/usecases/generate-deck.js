

function shuffle(array) {
    array.sort(() => Math.random() - 0.5);
  }

export const crearDeck = (tiposDeCarta, tiposEspeciales) => {




    if(!tiposDeCarta || tiposDeCarta.length === 0 ) 
            throw new Error("tipo de carta es obligatorio como un arreglo de string");

    if(!tiposEspeciales|| tiposEspeciales.length === 0 ) 
            throw new Error("tipos Especiales es obligatorio como un arreglo de string");


    let deck = [];

    for( let i = 2; i <= 10; i++ ) {
        for( let tipo of tiposDeCarta ) {
            deck.push( i + tipo);
        }
    }

    for( let tipo of tiposDeCarta ) {
        for( let esp of tiposEspeciales ) {
            deck.push( esp + tipo);
        }
    }
    
    
    shuffle(deck);

    return deck;
}