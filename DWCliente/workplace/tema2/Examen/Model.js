


class Articulo {
    constructor(id, nombre, localizacion, precio) {
        this.id = id
        this.nombre = nombre
        this.localizacion = localizacion
        this.precio = precio
    }

    toString() {
        return `Id: ${id}, Nombre: ${this.nombre}, Localización: ${this.localizacion}, Precio: ${precio}`
    }

    updatePrecio(newPrice){
        this.precio = newPrice;
    }

}

class ArticuloFresco extends Articulo {
    constructor(id, nombre, localizacion, precio, fecha, duracion) {
        super(id, nombre, localizacion, precio)
        this.fecha = fecha;
        this.duracion = duracion;
    }
    toString() {
        return `Id: ${this.id}, Nombre: ${this.nombre}, Localización: ${this.localizacion}, Precio: ${precio}, Fecha: ${this.fecha}, Duración: ${this.duracion} dias`
    }

    
}

