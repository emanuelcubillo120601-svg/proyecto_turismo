<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Administración | Costa Rica Travel
    </title>

</head>

<body>

    <h1>
        Panel Administrativo
    </h1>

    <p>
        Bienvenido,
        <?= htmlspecialchars($_SESSION["usuario_nombre"]) ?>
    </p>

    <nav>

        <a href="?page=admin-usuarios">
            Usuarios
        </a>

        |

        <a href="?page=admin-destinos">
            Destinos
        </a>

        |

        <a href="?page=admin-hoteles">
            Hoteles
        </a>

        |

        <a href="?page=admin-actividades">
            Actividades
        </a>

        |

        <a href="?page=admin-reservas">
            Reservaciones
        </a>

        |

        <a href="?page=reportes">
            Reportes
        </a>

        |

        <a href="?page=logout">
            Cerrar sesión
        </a>

    </nav>

</body>

</html>