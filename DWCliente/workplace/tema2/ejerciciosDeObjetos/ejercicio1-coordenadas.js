class Coordenadas {
    posX = 0;
    posY = 0;

    constructor(x, y) {
      typeof x === "number" ? (this.posX = x) : (this.posX = 0);

      typeof y === "number" ? (this.posY = y) : (this.posY = 0);
    }

    toString() {
      return `(${this.posX},${this.posY})`;
    }

    copia() {
      return new Coordenadas(this.posX, this.posY);
    }

    static suma(
      coordenada1 = new Coordenadas(0, 0),
      coordenada2 = new Coordenadas(0, 0)
    ) {
      return new Coordenadas(
        coordenada1.posX + coordenada2.posX,
        coordenada1.posY + coordenada2.posY
      );
    }

   static obtenerDistancia(
      coordenada1 = new Coordenadas(0, 0),
      coordenada2 = new Coordenadas(0, 0)
    ) {
      return Math.sqrt(
        Math.pow(coordenada1.posX - coordenada2.posX, 2) +
          Math.pow(coordenada1.posY - coordenada2.posY, 2)
      );
    }
  }


  const test = new Coordenadas(2,3);
  const copia = test.copia();
  console.log(test.toString())
  console.log(copia.toString())

    const suma = Coordenadas.suma(test, copia);
    console.log(suma)

    const distancia = Coordenadas.obtenerDistancia(copia, suma);
    console.log(distancia)