<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Reportes</title>

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
        href="?page=admin"
        class="logout-link"
    >
        Volver al panel
    </a>

</header>


<main class="dashboard-container">

    <div class="welcome">

        <h1>
            Reportes y estadísticas
        </h1>

        <p>
            Resumen general del sistema.
        </p>

    </div>


    <section class="dashboard-grid">

        <div class="dashboard-card">

            <h3>
                Usuarios registrados
            </h3>

            <p style="font-size:30px;">
                <?= (int)$totalUsuarios ?>
            </p>

        </div>


        <div class="dashboard-card">

            <h3>
                Reservaciones
            </h3>

            <p style="font-size:30px;">
                <?= (int)$totalReservaciones ?>
            </p>

        </div>


        <div class="dashboard-card">

            <h3>
                Ingresos estimados
            </h3>

            <p style="font-size:30px;">

                ₡<?= number_format(
                    $ingresosEstimados,
                    2
                ) ?>

            </p>

        </div>

    </section>


    <br><br>


    <section class="dashboard-card">

        <h3>
            Hoteles más reservados
        </h3>

        <br>

        <table style="width:100%;">

            <tr>
                <th>Hotel</th>
                <th>Reservaciones</th>
            </tr>

            <?php foreach ($hoteles as $hotel): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($hotel["nombre"]) ?>
                    </td>

                    <td>
                        <?= (int)$hotel["cantidad"] ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </section>


    <br>


    <section class="dashboard-card">

        <h3>
            Actividades más solicitadas
        </h3>

        <br>

        <table style="width:100%;">

            <tr>
                <th>Actividad</th>
                <th>Solicitudes</th>
            </tr>

            <?php foreach ($actividades as $actividad): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($actividad["nombre"]) ?>
                    </td>

                    <td>
                        <?= (int)$actividad["cantidad"] ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </section>


    <br>


    <section class="dashboard-card">

        <h3>
            Reservaciones por destino
        </h3>

        <br>

        <table style="width:100%;">

            <tr>
                <th>Destino</th>
                <th>Reservaciones</th>
            </tr>

            <?php foreach ($destinos as $destino): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($destino["nombre"]) ?>
                    </td>

                    <td>
                        <?= (int)$destino["cantidad"] ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </section>


    <br>


    <section class="dashboard-card">

        <h3>
            Reservaciones por fecha
        </h3>

        <br>

        <table style="width:100%;">

            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
            </tr>

            <?php foreach ($reservasFecha as $registro): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($registro["fecha"]) ?>
                    </td>

                    <td>
                        <?= (int)$registro["cantidad"] ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </section>

</main>

</body>
</html>