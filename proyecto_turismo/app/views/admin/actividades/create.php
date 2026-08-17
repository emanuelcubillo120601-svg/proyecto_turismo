<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nueva actividad
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>


<main class="dashboard-container">

    <h1>
        Registrar actividad
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


    <form
        method="POST"
        enctype="multipart/form-data"
    >

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

                <option value="">
                    Seleccione un destino
                </option>

                <?php foreach ($destinos as $destino): ?>

                    <option
                        value="<?= (int)$destino["id"] ?>"
                    >
                        <?= htmlspecialchars($destino["nombre"]) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label>Nombre</label>

            <input
                type="text"
                name="nombre"
                required
            >

        </div>


        <div class="form-group">

            <label>Descripción</label>

            <textarea
                name="descripcion"
                rows="5"
                required
            ></textarea>

        </div>


        <div class="form-group">

            <label>Precio</label>

            <input
                type="number"
                step="0.01"
                min="0"
                name="precio"
                required
            >

        </div>


        <div class="form-group">

            <label>Duración</label>

            <input
                type="text"
                name="duracion"
                placeholder="Ejemplo: 3 horas"
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
                required
            >

        </div>


        <div class="form-group">

            <label>
                Imagen de la actividad
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


        <button
            type="submit"
            class="btn btn-primary"
        >
            Guardar actividad
        </button>

    </form>

</main>

</body>

</html>