<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inicio | Costa Rica Travel</title>

</head>

<body>

    <h1>
        Bienvenido,
        <?= htmlspecialchars($_SESSION["usuario_nombre"]) ?>
    </h1>

    <p>
        Has iniciado sesión como cliente.
    </p>

    <nav>

        <a href="?page=destinos">
            Destinos
        </a>

        |

        <a href="?page=hoteles">
            Hoteles
        </a>

        |

        <a href="?page=actividades">
            Actividades
        </a>

        |

        <a href="?page=mis-reservas">
            Mis reservaciones
        </a>

        |

        <a href="?page=logout">
            Cerrar sesión
        </a>

    </nav>

</body>

</html>