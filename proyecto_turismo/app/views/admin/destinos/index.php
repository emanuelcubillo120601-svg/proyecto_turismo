<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Destinos | Costa Rica Travel</title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>

<header class="dashboard-header">

    <h2>Costa Rica Travel</h2>

    <a
        href="?page=admin"
        class="logout-link"
    >
        Volver al panel
    </a>

</header>


<main class="dashboard-container">

    <div class="welcome">

        <h1>Destinos turísticos</h1>

        <p>
            Administra los destinos registrados.
        </p>

    </div>


    <p>
        <a
            href="?page=admin-destino-crear"
            class="btn btn-primary"
            style="width:auto;"
        >
            + Nuevo destino
        </a>
    </p>


    <br>


    <form
        method="GET"
        style="display:flex; gap:10px; margin-bottom:25px;"
    >

        <input
            type="hidden"
            name="page"
            value="admin-destinos"
        >

        <input
            type="text"
            name="buscar"
            placeholder="Buscar por nombre o provincia"
            value="<?= htmlspecialchars($_GET["buscar"] ?? "") ?>"
            style="
                flex:1;
                padding:12px;
                border:1px solid #ccc;
                border-radius:8px;
            "
        >

        <button
            type="submit"
            class="btn btn-primary"
            style="width:auto;"
        >
            Buscar
        </button>

    </form>


    <div style="overflow-x:auto;">

        <table
            style="
                width:100%;
                border-collapse:collapse;
                background:white;
            "
        >

            <thead>

                <tr>

                    <th style="padding:12px; text-align:left;">
                        ID
                    </th>

                    <th style="padding:12px; text-align:left;">
                        Nombre
                    </th>

                    <th style="padding:12px; text-align:left;">
                        Provincia
                    </th>

                    <th style="padding:12px; text-align:left;">
                        Estado
                    </th>

                    <th style="padding:12px; text-align:left;">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php foreach ($destinos as $destino): ?>

                <tr
                    style="
                        border-top:1px solid #ddd;
                    "
                >

                    <td style="padding:12px;">
                        <?= (int)$destino["id"] ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($destino["nombre"]) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($destino["provincia"]) ?>
                    </td>

                    <td style="padding:12px;">

                        <?= (int)$destino["estado"] === 1
                            ? "Activo"
                            : "Inactivo"
                        ?>

                    </td>

                    <td style="padding:12px;">

                        <a
                            href="?page=admin-destino-editar&id=<?= (int)$destino["id"] ?>"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="?page=admin-destino-estado&id=<?= (int)$destino["id"] ?>"
                        >

                            <?= (int)$destino["estado"] === 1
                                ? "Desactivar"
                                : "Activar"
                            ?>

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>

</body>

</html>