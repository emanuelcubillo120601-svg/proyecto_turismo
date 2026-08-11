<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Nuevo destino | Costa Rica Travel</title>

</head>

<body>

    <h1>Registrar nuevo destino</h1>

    <a href="?page=admin-destinos">
        ← Volver a destinos
    </a>

    <hr>

    <?php if (isset($error)): ?>

        <p>
            <?= htmlspecialchars($error) ?>
        </p>

    <?php endif; ?>


    <form method="POST">

        <div>

            <label for="nombre">
                Nombre del destino:
            </label>

            <br>

            <input
                type="text"
                id="nombre"
                name="nombre"
                required
            >

        </div>

        <br>


        <div>

            <label for="provincia">
                Provincia:
            </label>

            <br>

            <input
                type="text"
                id="provincia"
                name="provincia"
                required
            >

        </div>

        <br>


        <div>

            <label for="descripcion">
                Descripción:
            </label>

            <br>

            <textarea
                id="descripcion"
                name="descripcion"
                rows="5"
                required
            ></textarea>

        </div>

        <br>


        <div>

            <label for="imagen">
                Imagen:
            </label>

            <br>

            <input
                type="text"
                id="imagen"
                name="imagen"
            >

        </div>

        <br>


        <div>

            <label for="latitud">
                Latitud:
            </label>

            <br>

            <input
                type="number"
                step="any"
                id="latitud"
                name="latitud"
            >

        </div>

        <br>


        <div>

            <label for="longitud">
                Longitud:
            </label>

            <br>

            <input
                type="number"
                step="any"
                id="longitud"
                name="longitud"
            >

        </div>

        <br>


        <button type="submit">
            Guardar destino
        </button>

    </form>

</body>

</html>