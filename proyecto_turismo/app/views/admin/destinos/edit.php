<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar destino</title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >
</head>

<body>

<main class="dashboard-container">

    <h1>Editar destino</h1>

    <p>
        <a href="?page=admin-destinos">
            ← Volver
        </a>
    </p>

    <?php if (isset($error)): ?>

        <p>
            <?= htmlspecialchars($error) ?>
        </p>

    <?php endif; ?>

    <form method="POST">

        <div class="form-group">

            <label>Nombre</label>

            <input
                type="text"
                name="nombre"
                value="<?= htmlspecialchars($destino["nombre"]) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label>Provincia</label>

            <input
                type="text"
                name="provincia"
                value="<?= htmlspecialchars($destino["provincia"]) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label>Descripción</label>

            <textarea
                name="descripcion"
                rows="5"
                required
            ><?= htmlspecialchars($destino["descripcion"]) ?></textarea>

        </div>

        <div class="form-group">

            <label>Imagen</label>

            <input
                type="text"
                name="imagen"
                value="<?= htmlspecialchars($destino["imagen"] ?? "") ?>"
            >

        </div>

        <div class="form-group">

            <label>Latitud</label>

            <input
                type="number"
                step="any"
                name="latitud"
                value="<?= htmlspecialchars($destino["latitud"] ?? "") ?>"
            >

        </div>

        <div class="form-group">

            <label>Longitud</label>

            <input
                type="number"
                step="any"
                name="longitud"
                value="<?= htmlspecialchars($destino["longitud"] ?? "") ?>"
            >

        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Guardar cambios
        </button>

    </form>

</main>

</body>

</html>