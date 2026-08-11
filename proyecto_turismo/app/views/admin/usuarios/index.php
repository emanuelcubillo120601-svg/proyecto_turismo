<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Usuarios
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
            Usuarios registrados
        </h1>

        <p>
            Administra las cuentas del sistema.
        </p>

    </div>


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

                    <th style="padding:12px;">Correo</th>

                    <th style="padding:12px;">Teléfono</th>

                    <th style="padding:12px;">Rol</th>

                    <th style="padding:12px;">Estado</th>

                    <th style="padding:12px;">Registro</th>

                    <th style="padding:12px;">Acción</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach ($usuarios as $usuario): ?>

                <tr
                    style="
                        border-top:1px solid #ddd;
                    "
                >

                    <td style="padding:12px;">
                        <?= (int)$usuario["id"] ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($usuario["nombre"]) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($usuario["correo"]) ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($usuario["telefono"] ?? "") ?>
                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($usuario["rol"]) ?>
                    </td>

                    <td style="padding:12px;">

                        <?= (int)$usuario["estado"] === 1
                            ? "Activo"
                            : "Inactivo"
                        ?>

                    </td>

                    <td style="padding:12px;">
                        <?= htmlspecialchars($usuario["fecha_registro"]) ?>
                    </td>

                    <td style="padding:12px;">

                        <?php if (
                            (int)$usuario["id"] ===
                            (int)$_SESSION["usuario_id"]
                        ): ?>

                            Cuenta actual

                        <?php else: ?>

                            <a
                                href="?page=admin-usuario-estado&id=<?= (int)$usuario["id"] ?>"
                            >

                                <?= (int)$usuario["estado"] === 1
                                    ? "Desactivar"
                                    : "Activar"
                                ?>

                            </a>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>