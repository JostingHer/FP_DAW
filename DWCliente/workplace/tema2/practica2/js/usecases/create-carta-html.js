export const crearCartaHTML = (carta) => {

    if(!carta) throw new Error('no has puesto la carta no se cual es la imagen');
    const imgCarta = document.createElement('img');
        imgCarta.src = `assets/cartas/${ carta }.png`; //3H, JD
        imgCarta.classList.add('carta');

    return imgCarta;
}