<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Actividades | Costa Rica Travel
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

    <div class="welcome">

        <h1>
            Actividades turísticas
        </h1>

        <p>
            Administra las actividades disponibles.
        </p>

    </div>


    <p>

        <a
            href="?page=admin-actividad-crear"
            class="btn btn-primary"
            style="width:auto;"
        >
            + Nueva actividad
        </a>

    </p>


    <br>


    <form
        method="GET"
        style="
            display:flex;
            gap:10px;
            margin-bottom:25px;
        "
    >

        <input
            type="hidden"
            name="page"
            value="admin-actividades"
        >

        <input
            type="text"
            name="buscar"
            placeholder="Buscar actividad o destino"
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

                    <th style="padding:12px;">
                        ID
                    </th>

                    <th style="padding:12px;">
                        Nombre
                    </th>

                    <th style="padding:12px;">
                        Destino
                    </th>

                    <th style="padding:12px;">
                        Precio
                    </th>

                    <th style="padding:12px;">
                        Duración
                    </th>

                    <th style="padding:12px;">
                        Cupo
                    </th>

                    <th style="padding:12px;">
                        Estado
                    </th>

                    <th style="padding:12px;">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php foreach ($actividades as $actividad): ?>

                <tr
                    style="
                        border-top:1px solid #ddd;
                    "
                >

                    <td style="padding:12px;">
                        <?= (int)$actividad["id"] ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($actividad["nombre"]) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($actividad["destino_nombre"]) ?>
                    </td>

                    <td style="padding:12px;">

                        ₡<?= number_format(
                            $actividad["precio"],
                            2
                        ) ?>

                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars(
                            $actividad["duracion"] ?? ""
                        ) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= (int)$actividad["cupo_maximo"] ?>
                    </td>

                    <td style="padding:12px;">

                        <?= (int)$actividad["estado"] === 1
                            ? "Activo"
                            : "Inactivo"
                        ?>

                    </td>

                    <td style="padding:12px;">

                        <a
                            href="?page=admin-actividad-editar&id=<?= (int)$actividad["id"] ?>"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="?page=admin-actividad-estado&id=<?= (int)$actividad["id"] ?>"
                        >

                            <?= (int)$actividad["estado"] === 1
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