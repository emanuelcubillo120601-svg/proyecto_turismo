<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Actividades</title>

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

        <h1>Actividades turísticas</h1>

        <p>
            Explora tours y experiencias disponibles.
        </p>

    </div>

    <section class="dashboard-grid">

        <?php foreach ($actividades as $actividad): ?>

            <div class="dashboard-card">

                <h3>
                    <?= htmlspecialchars($actividad["nombre"]) ?>
                </h3>

                <p>
                    <strong>Destino:</strong>
                    <?= htmlspecialchars($actividad["destino_nombre"]) ?>
                </p>

                <p>
                    <strong>Precio:</strong>
                    ₡<?= number_format($actividad["precio"], 2) ?>
                </p>

        <?php if ($actividad["precio_usd"] !== null): ?>

                <p>
                    <strong>Aproximado en USD:</strong>

                    $<?= number_format(
                        $actividad["precio_usd"],
                        2
                    ) ?>
                </p>

        <?php endif; ?>

                <p>
                    <strong>Duración:</strong>
                    <?= htmlspecialchars($actividad["duracion"] ?? "") ?>
                </p>

                <p>
                    <strong>Cupo:</strong>
                    <?= (int)$actividad["cupo_maximo"] ?>
                </p>

                <br>

                <p>
                    <?= htmlspecialchars($actividad["descripcion"]) ?>
                </p>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>