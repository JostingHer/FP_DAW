DROP DATABASE IF EXISTS libreria;
CREATE DATABASE libreria;
USE libreria;

-- Tabla escritor
CREATE TABLE escritor (
    codigo INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    nacionalidad VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    fecha_fallecimiento DATE,
    PRIMARY KEY (codigo)
);

-- Inserciones en la tabla escritor
INSERT INTO escritor (nombre, nacionalidad, fecha_nacimiento, fecha_fallecimiento)
VALUES 
    ('Gabriel García Márquez', 'Colombiana', '1927-03-06', '2014-04-17'),
    ('Isabel Allende', 'Chilena', '1942-08-02', NULL),
    ('J.K. Rowling', 'Británica', '1965-07-31', NULL),
    ('Ernest Hemingway', 'Estadounidense', '1899-07-21', '1961-07-02'),
    ('Jane Austen', 'Británica', '1775-12-16', '1817-07-18');

-- Tabla libro
CREATE TABLE libro (
    codigo INT NOT NULL AUTO_INCREMENT,
    codigo_escritor INT NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    agno_publicacion INT NOT NULL,
    numero_paginas INT NOT NULL,
    precio DECIMAL(7, 2) NOT NULL,
    PRIMARY KEY (codigo),
    FOREIGN KEY (codigo_escritor) REFERENCES escritor(codigo)
);

-- Inserciones en la tabla libro
INSERT INTO libro (codigo_escritor, titulo, agno_publicacion, numero_paginas, precio)
VALUES 
    (1, 'Cien Años de Soledad', 1967, 417, 29.99),
    (2, 'La Casa de los Espíritus', 1982, 368, 24.50),
    (3, 'Harry Potter y la Piedra Filosofal', 1997, 223, 19.99),
    (4, 'El Viejo y el Mar', 1952, 127, 15.75),
    (5, 'Orgullo y Prejuicio', 1813, 432, 20.99);

-- Tabla tienda
CREATE TABLE tienda (
    codigo INT NOT NULL AUTO_INCREMENT,
    centro_comercial VARCHAR(100),
    direccion VARCHAR(150) NOT NULL,
    localidad VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL UNIQUE,
    PRIMARY KEY (codigo)
);

-- Inserciones en la tabla tienda
INSERT INTO tienda (centro_comercial, direccion, localidad, telefono)
VALUES 
    ('Mall Plaza', 'Av. del Sol 123', 'Madrid', '912345678'),
    ('Centro Comercial La Vaguada', 'Calle Vaguada 456', 'Madrid', '913456789'),
    ('Gran Plaza', 'Av. Independencia 789', 'Barcelona', '934567890'),
    ('La Maquinista', 'Calle Maquinista 101', 'Barcelona', '932123456'),
    ('Plaza Mayor', 'Calle Mayor 102', 'Valencia', '961234567');

-- Tabla disponibilidad
CREATE TABLE disponibilidad (
    codigo_libro INT NOT NULL,
    codigo_tienda INT NOT NULL,
    cantidad INT NOT NULL,
    fecha_ultima_reposicion DATE NOT NULL,
    PRIMARY KEY (codigo_libro, codigo_tienda),
    FOREIGN KEY (codigo_libro) REFERENCES libro(codigo),
    FOREIGN KEY (codigo_tienda) REFERENCES tienda(codigo)
);

-- Inserciones en la tabla disponibilidad
INSERT INTO disponibilidad (codigo_libro, codigo_tienda, cantidad, fecha_ultima_reposicion)
VALUES 
    (1, 1, 20, '2024-10-15'),
    (2, 2, 15, '2024-10-12'),
    (3, 3, 10, '2024-10-10'),
    (4, 4, 25, '2024-10-18'),
    (5, 5, 30, '2024-10-20');