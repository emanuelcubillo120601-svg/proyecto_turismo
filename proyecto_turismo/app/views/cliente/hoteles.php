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
        href="?page=cliente"
        class="logout-link"
    >
        Volver
    </a>

</header>

<main class="dashboard-container">

    <div class="welcome">

        <h1>Hoteles</h1>

        <p>
            Consulta opciones de hospedaje disponibles.
        </p>

    </div>

    <section class="dashboard-grid">

        <?php foreach ($hoteles as $hotel): ?>

            <div class="dashboard-card">

                <h3>
                    <?= htmlspecialchars($hotel["nombre"]) ?>
                </h3>

                <p>
                    <strong>Destino:</strong>
                    <?= htmlspecialchars($hotel["destino_nombre"]) ?>
                </p>

                <p>
                    <strong>Categoría:</strong>
                    <?= htmlspecialchars($hotel["categoria"] ?? "") ?>
                </p>

                <p>
                    <strong>Precio por noche:</strong>
                    ₡<?= number_format($hotel["precio_noche"], 2) ?>
                </p>

         <?php if ($hotel["precio_usd"] !== null): ?>

                <p>
                    <strong>Aproximado en USD:</strong>

                    $<?= number_format(
                        $hotel["precio_usd"],
                        2
                    ) ?>
                </p>

            <?php endif; ?>

                <p>
                    <strong>Habitaciones:</strong>
                    <?= (int)$hotel["cantidad_habitaciones"] ?>
                </p>

                <br>

                <p>
                    <?= htmlspecialchars($hotel["descripcion"] ?? "") ?>
                </p>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>