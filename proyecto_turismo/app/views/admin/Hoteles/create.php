<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo hotel</title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >
</head>

<body>

<main class="dashboard-container">

    <h1>Registrar hotel</h1>

    <p>
        <a href="?page=admin-hoteles">
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

            <label>Destino</label>

            <select
                name="destino_id"
                required
                style="width:100%; padding:12px;"
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
            <input type="text" name="nombre" required>
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
            <input type="text" name="direccion" required>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono">
        </div>

        <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo">
        </div>

        <div class="form-group">

            <label>Precio por noche</label>

            <input
                type="number"
                step="0.01"
                min="0"
                name="precio_noche"
                required
            >

        </div>

        <div class="form-group">

            <label>Cantidad de habitaciones</label>

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
            <label>Imagen</label>
            <input type="text" name="imagen">
        </div>

        <button
            class="btn btn-primary"
            type="submit"
        >
            Guardar hotel
        </button>

    </form>

</main>

</body>

</html>