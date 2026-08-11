<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Bitácora
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
        href="?page=admin"
        class="logout-link"
    >
        Volver al panel
    </a>

</header>


<main class="dashboard-container">

    <section class="welcome">

        <h1>
            Bitácora del sistema
        </h1>

        <p>
            Registro de acciones administrativas.
        </p>

    </section>


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
                        Usuario
                    </th>

                    <th style="padding:12px;">
                        Acción
                    </th>

                    <th style="padding:12px;">
                        Fecha
                    </th>

                </tr>

            </thead>


            <tbody>

            <?php foreach ($registros as $registro): ?>

                <tr
                    style="
                        border-top:1px solid #ddd;
                        text-align:center;
                    "
                >

                    <td style="padding:12px;">
                        <?= (int)$registro["id"] ?>
                    </td>

                    <td style="padding:12px;">

                        <?= htmlspecialchars(
                            $registro["usuario_nombre"]
                            ?? "Usuario eliminado"
                        ) ?>

                    </td>

                    <td style="padding:12px;">

                        <?= htmlspecialchars(
                            $registro["accion"]
                        ) ?>

                    </td>

                    <td style="padding:12px;">

                        <?= htmlspecialchars(
                            $registro["fecha_registro"]
                        ) ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>

</body>

</html>