<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nueva reservación
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>

<header class="dashboard-header">

    <h2>
        Costa Rica Travel
    </h2>

    <a
        href="?page=cliente"
        class="logout-link"
    >
        Volver
    </a>

</header>


<main class="dashboard-container">

    <h1>
        Realizar reservación
    </h1>

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
                Hotel
            </label>

            <select
                name="hotel_id"
                required
                style="
                    width:100%;
                    padding:12px;
                "
            >

                <option value="">
                    Seleccione un hotel
                </option>

                <?php foreach ($hoteles as $hotel): ?>

                    <option
                        value="<?= (int)$hotel["id"] ?>"
                    >

                        <?= htmlspecialchars($hotel["nombre"]) ?>

                        -

                        <?= htmlspecialchars($hotel["destino_nombre"]) ?>

                        -

                        ₡<?= number_format(
                            $hotel["precio_noche"],
                            2
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label>
                Fecha de entrada
            </label>

            <input
                type="date"
                name="fecha_entrada"
                min="<?= date("Y-m-d") ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Fecha de salida
            </label>

            <input
                type="date"
                name="fecha_salida"
                min="<?= date("Y-m-d") ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Cantidad de personas
            </label>

            <input
                type="number"
                name="cantidad_personas"
                min="1"
                required
            >

        </div>


        <h3>
            Actividades opcionales
        </h3>

        <br>


        <?php foreach ($actividades as $actividad): ?>

            <div
                style="
                    background:white;
                    padding:15px;
                    margin-bottom:10px;
                    border-radius:8px;
                "
            >

                <label>

                    <input
                        type="checkbox"
                        name="actividades[]"
                        value="<?= (int)$actividad["id"] ?>"
                    >

                    <strong>
                        <?= htmlspecialchars($actividad["nombre"]) ?>
                    </strong>

                    -

                    <?= htmlspecialchars($actividad["destino_nombre"]) ?>

                    -

                    ₡<?= number_format(
                        $actividad["precio"],
                        2
                    ) ?>

                </label>

            </div>

        <?php endforeach; ?>


        <button
            type="submit"
            class="btn btn-primary"
        >
            Confirmar reservación
        </button>

    </form>

</main>

</body>

</html>