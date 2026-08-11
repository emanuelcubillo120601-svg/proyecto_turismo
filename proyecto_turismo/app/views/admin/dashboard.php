<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Panel Administrativo | Costa Rica Travel
    </title>

<link
    rel="stylesheet"
    href="/proyecto_turismo/public/css/styles.css"
>

</head>

<body>

    <header class="dashboard-header">

        <h2>
            Costa Rica Travel
        </h2>

        <a
            href="?page=logout"
            class="logout-link"
        >
            Cerrar sesión
        </a>

    </header>

    <main class="dashboard-container">

        <section class="welcome">

            <h1>
                Panel Administrativo
            </h1>

            <p>
                Bienvenido,
                <?= htmlspecialchars($_SESSION["usuario_nombre"]) ?>
            </p>

        </section>

        <section class="dashboard-grid">

            <a
                href="?page=admin-usuarios"
                class="dashboard-card"
            >

                <h3>
                    Usuarios
                </h3>

                <p>
                    Administra los usuarios registrados.
                </p>

            </a>


            <a
                href="?page=admin-destinos"
                class="dashboard-card"
            >

                <h3>
                    Destinos
                </h3>

                <p>
                    Registra y administra destinos turísticos.
                </p>

            </a>


            <a
                href="?page=admin-hoteles"
                class="dashboard-card"
            >

                <h3>
                    Hoteles
                </h3>

                <p>
                    Administra hoteles, precios y disponibilidad.
                </p>

            </a>


            <a
                href="?page=admin-actividades"
                class="dashboard-card"
            >

                <h3>
                    Actividades
                </h3>

                <p>
                    Gestiona tours y actividades turísticas.
                </p>

            </a>


            <a
                href="?page=admin-reservas"
                class="dashboard-card"
            >

                <h3>
                    Reservaciones
                </h3>

                <p>
                    Consulta y administra las reservaciones.
                </p>

            </a>


            <a
                href="?page=reportes"
                class="dashboard-card"
            >

                <h3>
                    Reportes
                </h3>

                <p>
                    Consulta estadísticas e información general.
                </p>

            </a>

        </section>

    </main>

</body>

</html>