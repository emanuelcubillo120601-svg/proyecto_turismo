<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Mis reservaciones
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
        href="?page=cliente"
        class="logout-link"
    >
        Volver al inicio
    </a>

</header>


<main class="dashboard-container">


    <section class="welcome">

        <h1>
            Mis reservaciones
        </h1>

        <p>
            Consulta las reservaciones que has realizado.
        </p>

    </section>


    <div style="margin-bottom:25px;">

        <a
            href="?page=reservar"
            class="btn btn-primary"
            style="width:auto;"
        >
            + Nueva reservación
        </a>

    </div>


    <?php if (empty($reservas)): ?>

        <div class="dashboard-card">

            <p>
                Todavía no tienes reservaciones registradas.
            </p>

        </div>


    <?php else: ?>


        <div style="overflow-x:auto;">

            <table
                style="
                    width:100%;
                    background:white;
                    border-collapse:collapse;
                "
            >

                <thead>

                    <tr>

                        <th style="padding:12px;">
                            ID
                        </th>

                        <th style="padding:12px;">
                            Destino
                        </th>

                        <th style="padding:12px;">
                            Hotel
                        </th>

                        <th style="padding:12px;">
                            Entrada
                        </th>

                        <th style="padding:12px;">
                            Salida
                        </th>

                        <th style="padding:12px;">
                            Personas
                        </th>

                        <th style="padding:12px;">
                            Total estimado
                        </th>

                        <th style="padding:12px;">
                            Estado
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php foreach ($reservas as $reserva): ?>

                    <tr
                        style="
                            border-top:1px solid #ddd;
                            text-align:center;
                        "
                    >

                        <td style="padding:12px;">

                            <?= (int)$reserva["id"] ?>

                        </td>


                        <td style="padding:12px;">

                            <?= htmlspecialchars(
                                $reserva["destino_nombre"]
                            ) ?>

                        </td>


                        <td style="padding:12px;">

                            <?= htmlspecialchars(
                                $reserva["hotel_nombre"]
                            ) ?>

                        </td>


                        <td style="padding:12px;">

                            <?= htmlspecialchars(
                                $reserva["fecha_entrada"]
                            ) ?>

                        </td>


                        <td style="padding:12px;">

                            <?= htmlspecialchars(
                                $reserva["fecha_salida"]
                            ) ?>

                        </td>


                        <td style="padding:12px;">

                            <?= (int)$reserva["cantidad_personas"] ?>

                        </td>


                        <td style="padding:12px;">

                            ₡<?= number_format(
                                $reserva["total_estimado"],
                                2
                            ) ?>

                        </td>


                        <td style="padding:12px;">

                            <?= htmlspecialchars(
                                $reserva["estado"]
                            ) ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>


    <?php endif; ?>


</main>


</body>

</html>