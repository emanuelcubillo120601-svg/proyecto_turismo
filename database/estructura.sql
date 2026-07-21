CREATE DATABASE IF NOT EXISTS turismo_cr
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE turismo_cr;


-- ==========================
-- TABLA DE ROLES
-- ==========================

CREATE TABLE roles (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(50) NOT NULL UNIQUE

);


-- ==========================
-- TABLA DE USUARIOS
-- ==========================

CREATE TABLE usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    rol_id INT NOT NULL,

    nombre VARCHAR(100) NOT NULL,

    correo VARCHAR(150) NOT NULL UNIQUE,

    telefono VARCHAR(20),

    password VARCHAR(255) NOT NULL,

    fotografia VARCHAR(255),

    estado TINYINT(1) DEFAULT 1,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_usuario_rol
        FOREIGN KEY (rol_id)
        REFERENCES roles(id)

);
-- ==========================
-- TABLA DE DESTINOS
-- ==========================

CREATE TABLE destinos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(100) NOT NULL,

    provincia VARCHAR(100) NOT NULL,

    descripcion TEXT NOT NULL,

    imagen VARCHAR(255),

    latitud DECIMAL(10, 8),

    longitud DECIMAL(11, 8),

    estado TINYINT(1) DEFAULT 1,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


-- ==========================
-- TABLA DE HOTELES
-- ==========================

CREATE TABLE hoteles (

    id INT AUTO_INCREMENT PRIMARY KEY,

    destino_id INT NOT NULL,

    nombre VARCHAR(150) NOT NULL,

    categoria VARCHAR(50),

    direccion VARCHAR(255) NOT NULL,

    telefono VARCHAR(20),

    correo VARCHAR(150),

    precio_noche DECIMAL(10, 2) NOT NULL,

    cantidad_habitaciones INT NOT NULL,

    descripcion TEXT,

    imagen VARCHAR(255),

    estado TINYINT(1) DEFAULT 1,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_hotel_destino
        FOREIGN KEY (destino_id)
        REFERENCES destinos(id)

);


-- ==========================
-- TABLA DE ACTIVIDADES
-- ==========================

CREATE TABLE actividades (

    id INT AUTO_INCREMENT PRIMARY KEY,

    destino_id INT NOT NULL,

    nombre VARCHAR(150) NOT NULL,

    descripcion TEXT NOT NULL,

    precio DECIMAL(10, 2) NOT NULL,

    duracion VARCHAR(100),

    cupo_maximo INT NOT NULL,

    imagen VARCHAR(255),

    estado TINYINT(1) DEFAULT 1,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_actividad_destino
        FOREIGN KEY (destino_id)
        REFERENCES destinos(id)

);