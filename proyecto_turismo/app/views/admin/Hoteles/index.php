<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Hoteles</title>

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

        <h1>Hoteles</h1>

        <p>
            Administra los hoteles registrados.
        </p>

    </div>

    <p>
        <a
            href="?page=admin-hotel-crear"
            class="btn btn-primary"
            style="width:auto;"
        >
            + Nuevo hotel
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
            value="admin-hoteles"
        >

        <input
            type="text"
            name="buscar"
            placeholder="Buscar hotel o destino"
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

                    <th style="padding:12px;">ID</th>
                    <th style="padding:12px;">Nombre</th>
                    <th style="padding:12px;">Destino</th>
                    <th style="padding:12px;">Precio</th>
                    <th style="padding:12px;">Habitaciones</th>
                    <th style="padding:12px;">Estado</th>
                    <th style="padding:12px;">Acciones</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach ($hoteles as $hotel): ?>

                <tr style="border-top:1px solid #ddd;">

                    <td style="padding:12px;">
                        <?= (int)$hotel["id"] ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($hotel["nombre"]) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($hotel["destino_nombre"]) ?>
                    </td>

                    <td style="padding:12px;">
                        ₡<?= number_format($hotel["precio_noche"], 2) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= (int)$hotel["cantidad_habitaciones"] ?>
                    </td>

                    <td style="padding:12px;">

                        <?= (int)$hotel["estado"] === 1
                            ? "Activo"
                            : "Inactivo"
                        ?>

                    </td>

                    <td style="padding:12px;">

                        <a
                            href="?page=admin-hotel-editar&id=<?= (int)$hotel["id"] ?>"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="?page=admin-hotel-estado&id=<?= (int)$hotel["id"] ?>"
                        >

                            <?= (int)$hotel["estado"] === 1
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