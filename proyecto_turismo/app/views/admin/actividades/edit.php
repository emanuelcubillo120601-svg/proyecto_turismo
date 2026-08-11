<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Editar actividad
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>

<main class="dashboard-container">

    <h1>
        Editar actividad
    </h1>

    <p>
        <a href="?page=admin-actividades">
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


    <form method="POST">

        <?= CsrfHelper::input() ?>


        <div class="form-group">

            <label>
                Destino
            </label>

            <select
                name="destino_id"
                required
                style="
                    width:100%;
                    padding:12px;
                "
            >

                <?php foreach ($destinos as $destino): ?>

                    <option
                        value="<?= (int)$destino["id"] ?>"

                        <?= (int)$actividad["destino_id"] ===
                            (int)$destino["id"]
                                ? "selected"
                                : ""
                        ?>
                    >

                        <?= htmlspecialchars($destino["nombre"]) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label>
                Nombre
            </label>

            <input
                type="text"
                name="nombre"
                value="<?= htmlspecialchars($actividad["nombre"]) ?>"
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
            ><?= htmlspecialchars($actividad["descripcion"]) ?></textarea>

        </div>


        <div class="form-group">

            <label>
                Precio
            </label>

            <input
                type="number"
                step="0.01"
                min="0"
                name="precio"
                value="<?= htmlspecialchars($actividad["precio"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Duración
            </label>

            <input
                type="text"
                name="duracion"
                value="<?= htmlspecialchars($actividad["duracion"] ?? "") ?>"
            >

        </div>


        <div class="form-group">

            <label>
                Cupo máximo
            </label>

            <input
                type="number"
                min="1"
                name="cupo_maximo"
                value="<?= (int)$actividad["cupo_maximo"] ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Imagen
            </label>

            <input
                type="text"
                name="imagen"
                value="<?= htmlspecialchars($actividad["imagen"] ?? "") ?>"
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