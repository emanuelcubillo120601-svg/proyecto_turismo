<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nuevo hotel
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>


<main class="dashboard-container">

    <h1>
        Registrar hotel
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
                    Seleccione
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

            <label>Categoría</label>

            <input
                type="text"
                name="categoria"
                placeholder="Ejemplo: 4 estrellas"
            >

        </div>


        <div class="form-group">

            <label>Dirección</label>

            <input
                type="text"
                name="direccion"
                required
            >

        </div>


        <div class="form-group">

            <label>Teléfono</label>

            <input
                type="text"
                name="telefono"
            >

        </div>


        <div class="form-group">

            <label>Correo</label>

            <input
                type="email"
                name="correo"
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
                required
            >

        </div>


        <div class="form-group">

            <label>Descripción</label>

            <textarea
                name="descripcion"
                rows="5"
            ></textarea>

        </div>


        <div class="form-group">

            <label>
                Imagen del hotel
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
            Guardar hotel
        </button>

    </form>

</main>

</body>

</html>