<?php
/** @var array $destino */
?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Editar destino
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>


<main class="dashboard-container">

    <h1>
        Editar destino
    </h1>


    <p>

        <a href="?page=admin-destinos">
            ← Volver
        </a>

    </p>


    <br>


    <?php if (isset($error)): ?>

        <p>
            <?= htmlspecialchars($error) ?>
        </p>

        <br>

    <?php endif; ?>


    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <?= CsrfHelper::input() ?>


        <div class="form-group">

            <label>
                Nombre
            </label>

            <input
                type="text"
                name="nombre"
                value="<?= htmlspecialchars($destino["nombre"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Provincia
            </label>

            <input
                type="text"
                name="provincia"
                value="<?= htmlspecialchars($destino["provincia"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Descripción
            </label>

            <textarea
                name="descripcion"
                rows="5"
                required
            ><?= htmlspecialchars($destino["descripcion"]) ?></textarea>

        </div>


        <div class="form-group">

            <label>
                Imagen
            </label>


            <?php if (!empty($destino["imagen"])): ?>

                <img
                    src="/proyecto_turismo/public/<?= htmlspecialchars($destino["imagen"]) ?>"
                    alt="Imagen actual"
                    style="
                        width:220px;
                        height:150px;
                        object-fit:cover;
                        border-radius:10px;
                        display:block;
                        margin:10px 0;
                    "
                >

            <?php endif; ?>


            <input
                type="file"
                name="imagen"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <small>
                Déjalo vacío para conservar la imagen actual.
            </small>

        </div>


        <div class="form-group">

            <label>
                Latitud
            </label>

            <input
                type="number"
                step="any"
                name="latitud"
                value="<?= htmlspecialchars($destino["latitud"] ?? "") ?>"
            >

        </div>


        <div class="form-group">

            <label>
                Longitud
            </label>

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