<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

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
        Volver
    </a>

</header>


<main class="dashboard-container">

    <h1>
        Mis reservaciones
    </h1>

    <br>

    <p>

        <a
            href="?page=reservar"
            class="btn btn-primary"
            style="width:auto;"
        >
            + Nueva reservación
        </a>

    </p>

    <br>


    <?php if (empty($reservas)): ?>

        <p>
            Todavía no tienes reservaciones.
        </p>

    <?php else: ?>

        <div style="overflow-x:auto;">

            <table
                style="
                    width:100%;
                    background:white;
                    border-collapse:collapse;
                "
            >

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
                        Total
                    </th>

                    <th style="padding:12px;">
                        Estado
                    </th>

                </tr>

                <?php foreach ($reservas as $reserva): ?>

                    <tr
                        style="border-top:1px solid #ddd;"
                    >

                        <td style="padding:12px;">
                            <?= (int)$reserva["id"] ?>
                        </td>

                        <td style="padding:12px;">
                            <?= htmlspecialchars($reserva["destino_nombre"]) ?>
                        </td>

                        <td style="padding:12px;">
                            <?= htmlspecialchars($reserva["hotel_nombre"]) ?>
                        </td>

                        <td style="padding:12px;">
                            <?= htmlspecialchars($reserva["fecha_entrada"]) ?>
                        </td>

                        <td style="padding:12px;">
                            <?= htmlspecialchars($reserva["fecha_salida"]) ?>
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
                            <?= htmlspecialchars($reserva["estado"]) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    <?php endif; ?>

</main>

</body>

</html>