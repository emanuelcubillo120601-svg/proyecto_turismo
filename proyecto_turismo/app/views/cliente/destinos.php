<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Destinos</title>

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

        <h1>Destinos turísticos</h1>

        <p>
            Explora diferentes destinos de Costa Rica.
        </p>

    </div>

    <section class="dashboard-grid">

        <?php foreach ($destinos as $destino): ?>

            <div class="dashboard-card">

                <h3>
                    <?= htmlspecialchars($destino["nombre"]) ?>
                </h3>

                <p>
                    <strong>Provincia:</strong>
                    <?= htmlspecialchars($destino["provincia"]) ?>
                </p>

                <br>

                <p>
                    <?= htmlspecialchars($destino["descripcion"]) ?>
                </p>

                <?php if (!empty($destino["clima"])): ?>

    <br>

    <p>
            <strong>Temperatura actual:</strong>

            <?= htmlspecialchars(
                $destino["clima"]["temperature_2m"]
            ) ?> °C
        </p>

        <p>
            <strong>Viento:</strong>

            <?= htmlspecialchars(
                $destino["clima"]["wind_speed_10m"]
            ) ?> km/h
        </p>

    <?php else: ?>

        <br>

        <p>
            Clima no disponible.
        </p>

    <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>