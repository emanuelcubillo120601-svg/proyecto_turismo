<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Inicio | Costa Rica Travel
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
                ¡Bienvenido!
            </h1>

            <p>
                Hola,
                <?= htmlspecialchars($_SESSION["usuario_nombre"]) ?>.
                ¿Qué deseas explorar hoy?
            </p>

        </section>

        <section class="dashboard-grid">

            <a
                href="?page=destinos"
                class="dashboard-card"
            >

                <h3>
                    Destinos
                </h3>

                <p>
                    Descubre diferentes lugares turísticos de Costa Rica.
                </p>

            </a>


            <a
                href="?page=hoteles"
                class="dashboard-card"
            >

                <h3>
                    Hoteles
                </h3>

                <p>
                    Encuentra opciones de hospedaje para tu viaje.
                </p>

            </a>


            <a
                href="?page=actividades"
                class="dashboard-card"
            >

                <h3>
                    Actividades
                </h3>

                <p>
                    Explora tours, aventuras y experiencias.
                </p>

            </a>


            <a
                href="?page=mis-reservas"
                class="dashboard-card"
            >

                <h3>
                    Mis reservaciones
                </h3>

                <p>
                    Consulta tus reservaciones y viajes.
                </p>

            </a>


            <a
                href="?page=perfil"
                class="dashboard-card"
            >

                <h3>
                    Mi perfil
                </h3>

                <p>
                    Administra tu información personal.
                </p>

            </a>

        </section>

    </main>

</body>

</html>