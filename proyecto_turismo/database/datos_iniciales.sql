USE turismo_cr;

INSERT INTO roles (nombre)
VALUES
('Administrador'),
('Cliente');
INSERT INTO destinos
(nombre, provincia, descripcion, latitud, longitud)
VALUES
(
    'Puerto Viejo',
    'Limón',
    'Destino turístico del Caribe costarricense conocido por sus playas, naturaleza y cultura.',
    9.6567,
    -82.7549
),
(
    'La Fortuna',
    'Alajuela',
    'Destino reconocido por el Volcán Arenal, aguas termales y actividades de aventura.',
    10.4678,
    -84.6427
),
(
    'Manuel Antonio',
    'Puntarenas',
    'Destino turístico famoso por sus playas y su parque nacional.',
    9.3923,
    -84.1365
);