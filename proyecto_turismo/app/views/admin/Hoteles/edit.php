<?php
/** @var array $hotel */
/** @var array $destinos */
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
        Editar hotel
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>


<main class="dashboard-container">

    <h1>
        Editar hotel
    </h1>


    <p>

        <a href="?page=admin-hoteles">
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

            <label>Destino</label>

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

                        <?= (int)$hotel["destino_id"] ===
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

            <label>Nombre</label>

            <input
                type="text"
                name="nombre"
                value="<?= htmlspecialchars($hotel["nombre"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Categoría</label>

            <input
                type="text"
                name="categoria"
                value="<?= htmlspecialchars($hotel["categoria"] ?? "") ?>"
            >

        </div>


        <div class="form-group">

            <label>Dirección</label>

            <input
                type="text"
                name="direccion"
                value="<?= htmlspecialchars($hotel["direccion"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Teléfono</label>

            <input
                type="text"
                name="telefono"
                value="<?= htmlspecialchars($hotel["telefono"] ?? "") ?>"
            >

        </div>


        <div class="form-group">

            <label>Correo</label>

            <input
                type="email"
                name="correo"
                value="<?= htmlspecialchars($hotel["correo"] ?? "") ?>"
            >

        </div>


        <div class="form-group">

            <label>
                Precio por noche
            </label>

            <input
                type="number"
                step="0.01"
                min="0"
                name="precio_noche"
                value="<?= htmlspecialchars($hotel["precio_noche"]) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Cantidad de habitaciones
            </label>

            <input
                type="number"
                min="1"
                name="cantidad_habitaciones"
                value="<?= (int)$hotel["cantidad_habitaciones"] ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Descripción</label>

            <textarea
                name="descripcion"
                rows="5"
            ><?= htmlspecialchars($hotel["descripcion"] ?? "") ?></textarea>

        </div>


        <div class="form-group">

            <label>Imagen</label>


            <?php if (!empty($hotel["imagen"])): ?>

                <img
                    src="/proyecto_turismo/public/<?= htmlspecialchars($hotel["imagen"]) ?>"
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