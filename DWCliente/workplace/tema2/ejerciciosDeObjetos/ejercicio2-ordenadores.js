class Ordenador {
    marca;
    modelo;
    memoria = 4;
    disco = 512;
    pulgadas = 17;

    constructor(marca, modelo, memoria, disco, pulgadas) {
        this.marca = marca;
        this.modelo = modelo;
        this.memoria = memoria;
        this.disco = disco;
        this.pulgadas = pulgadas;
    }

    toString() {
        return `Marca: ${this.marca}, Modelo: ${this.modelo}, Memoria: ${this.memoria}, Disco: ${this.disco}, Pulgadas: ${this.pulgadas}`;
    }


  }


  class Portatil extends Ordenador {

    autonomia = 4;
    

    constructor(marca, modelo, memoria, disco=256, pulgadas = 12, autonomia) {
        super(marca, modelo, memoria, disco, pulgadas);
        this.autonomia = autonomia;
    }

    toString() {
        return super.toString() + `, Autonomía: ${this.autonomia}`;
    }

  }
 


  let ordenador1 = new Ordenador("HP", "Pavilion", 8, 1024, 15);
  console.log(ordenador1.toString());
  let portatil1 = new Portatil("Lenovo", "Thinkpad", 16, 512, 14, 8);
  console.log(portatil1.toString());