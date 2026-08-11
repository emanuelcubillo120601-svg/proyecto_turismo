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

-- ==========================
-- TABLA DE RESERVACIONES
-- ==========================

CREATE TABLE reservaciones (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    hotel_id INT NOT NULL,

    fecha_entrada DATE NOT NULL,

    fecha_salida DATE NOT NULL,

    cantidad_personas INT NOT NULL,

    total_estimado DECIMAL(12, 2) NOT NULL DEFAULT 0,

    estado VARCHAR(30) NOT NULL DEFAULT 'Confirmada',

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_reservacion_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id),

    CONSTRAINT fk_reservacion_hotel
        FOREIGN KEY (hotel_id)
        REFERENCES hoteles(id)

);


-- ==========================
-- ACTIVIDADES DE RESERVACION
-- ==========================

CREATE TABLE reservacion_actividades (

    id INT AUTO_INCREMENT PRIMARY KEY,

    reservacion_id INT NOT NULL,

    actividad_id INT NOT NULL,

    cantidad_personas INT NOT NULL,

    precio_unitario DECIMAL(10, 2) NOT NULL,

    subtotal DECIMAL(12, 2) NOT NULL,

    CONSTRAINT fk_ra_reservacion
        FOREIGN KEY (reservacion_id)
        REFERENCES reservaciones(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_ra_actividad
        FOREIGN KEY (actividad_id)
        REFERENCES actividades(id)

);


-- ==========================
-- TABLA DE RECUPERACION DE PASSWORD
-- ==========================

CREATE TABLE recuperacion_password (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    token_hash VARCHAR(255) NOT NULL,

    fecha_expiracion DATETIME NOT NULL,

    usado TINYINT(1) DEFAULT 0,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_recuperacion_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE

);


-- ==========================
-- TABLA DE FAVORITOS
-- ==========================

CREATE TABLE favoritos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    destino_id INT NOT NULL,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_favorito_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_favorito_destino
        FOREIGN KEY (destino_id)
        REFERENCES destinos(id)
        ON DELETE CASCADE,

    CONSTRAINT uq_favorito
        UNIQUE (usuario_id, destino_id)
);


-- ==========================
-- TABLA DE COMENTARIOS
-- ==========================

CREATE TABLE comentarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    destino_id INT NOT NULL,

    comentario TEXT NOT NULL,

    calificacion INT NOT NULL,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_comentario_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_comentario_destino
        FOREIGN KEY (destino_id)
        REFERENCES destinos(id)
        ON DELETE CASCADE,

    CONSTRAINT chk_calificacion
        CHECK (calificacion BETWEEN 1 AND 5)

);



-- ==========================
-- TABLA DE BiTACORA
-- ==========================


CREATE TABLE bitacora (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT,

    accion VARCHAR(255) NOT NULL,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_bitacora_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE SET NULL
);







);
);