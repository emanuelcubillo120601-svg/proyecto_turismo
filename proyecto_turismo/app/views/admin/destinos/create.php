<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nuevo destino
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>


<main class="dashboard-container">

    <h1>
        Registrar nuevo destino
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
                value="<?= htmlspecialchars($_POST["nombre"] ?? "") ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Provincia
            </label>

            <select
                name="provincia"
                required
                style="
                    width:100%;
                    padding:12px;
                "
            >

                <option value="">
                    Seleccione
                </option>

                <?php

                $provincias = [
                    "San José",
                    "Alajuela",
                    "Cartago",
                    "Heredia",
                    "Guanacaste",
                    "Puntarenas",
                    "Limón"
                ];

                foreach ($provincias as $provincia):

                ?>

                    <option
                        value="<?= htmlspecialchars($provincia) ?>"
                    >
                        <?= htmlspecialchars($provincia) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label>
                Descripción
            </label>

            <textarea
                name="descripcion"
                rows="5"
                required
            ><?= htmlspecialchars($_POST["descripcion"] ?? "") ?></textarea>

        </div>


        <div class="form-group">

            <label>
                Imagen del destino
            </label>

            <input
                type="file"
                name="imagen"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <small>
                JPG, PNG o WEBP. Máximo 5 MB.
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
                value="<?= htmlspecialchars($_POST["latitud"] ?? "") ?>"
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
                value="<?= htmlspecialchars($_POST["longitud"] ?? "") ?>"
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary"
        >
            Guardar destino
        </button>

    </form>

</main>

</body>

</html>