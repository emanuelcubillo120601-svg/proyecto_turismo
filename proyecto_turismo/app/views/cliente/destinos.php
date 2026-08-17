<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Destinos
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

    <section class="welcome">

        <h1>
            Destinos turísticos
        </h1>

        <p>
            Explora diferentes destinos de Costa Rica.
        </p>

    </section>


    <?php if (isset($_SESSION["comentario_exito"])): ?>

        <p>
            <?= htmlspecialchars(
                $_SESSION["comentario_exito"]
            ) ?>
        </p>

        <?php
        unset($_SESSION["comentario_exito"]);
        ?>

        <br>

    <?php endif; ?>


    <?php if (isset($_SESSION["comentario_error"])): ?>

        <p>
            <?= htmlspecialchars(
                $_SESSION["comentario_error"]
            ) ?>
        </p>

        <?php
        unset($_SESSION["comentario_error"]);
        ?>

        <br>

    <?php endif; ?>


    <section class="dashboard-grid">

        <?php foreach ($destinos as $destino): ?>

            <div class="dashboard-card">

                <?php if (!empty($destino["imagen"])): ?>

                    <img
                        src="/proyecto_turismo/public/<?= htmlspecialchars($destino["imagen"]) ?>"
                        alt="<?= htmlspecialchars($destino["nombre"]) ?>"
                        style="
                            width:100%;
                            height:220px;
                            object-fit:cover;
                            border-radius:12px;
                            margin-bottom:15px;
                        "
                        >

                <?php endif; ?>


                <h3>
                    <?= htmlspecialchars(
                        $destino["nombre"]
                    ) ?>
                </h3>


                <p>

                    <strong>
                        Provincia:
                    </strong>

                    <?= htmlspecialchars(
                        $destino["provincia"]
                    ) ?>

                </p>


                <br>


                <p>
                    <?= htmlspecialchars(
                        $destino["descripcion"]
                    ) ?>
                </p>


                <br>


                <p>

                    <strong>
                        Calificación:
                    </strong>

                    <?= number_format(
                        (float)$destino["promedio"],
                        1
                    ) ?>

                    / 5

                </p>


                <?php if (!empty($destino["clima"])): ?>

                    <br>

                    <p>

                        <strong>
                            Temperatura:
                        </strong>

                        <?= htmlspecialchars(
                            $destino["clima"]["temperature_2m"]
                        ) ?> °C

                    </p>


                    <p>

                        <strong>
                            Viento:
                        </strong>

                        <?= htmlspecialchars(
                            $destino["clima"]["wind_speed_10m"]
                        ) ?> km/h

                    </p>

                <?php endif; ?>


                <br>


                <form
                    method="POST"
                    action="?page=favorito"
                >

                    <?= CsrfHelper::input() ?>

                    <input
                        type="hidden"
                        name="id"
                        value="<?= (int)$destino["id"] ?>"
                    >

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Agregar / quitar favorito
                    </button>

                </form>


                <br>


                <h4>
                    Dejar comentario
                </h4>


                <form
                    method="POST"
                    action="?page=comentario-crear"
                >

                    <?= CsrfHelper::input() ?>

                    <input
                        type="hidden"
                        name="destino_id"
                        value="<?= (int)$destino["id"] ?>"
                    >


                    <div class="form-group">

                        <label>
                            Calificación
                        </label>

                        <select
                            name="calificacion"
                            required
                            style="
                                width:100%;
                                padding:10px;
                            "
                        >

                            <option value="5">
                                5 - Excelente
                            </option>

                            <option value="4">
                                4 - Muy bueno
                            </option>

                            <option value="3">
                                3 - Bueno
                            </option>

                            <option value="2">
                                2 - Regular
                            </option>

                            <option value="1">
                                1 - Malo
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Comentario
                        </label>

                        <textarea
                            name="comentario"
                            rows="3"
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Publicar comentario
                    </button>

                </form>


                <?php if (
                    !empty($destino["comentarios"])
                ): ?>

                    <br>

                    <h4>
                        Comentarios
                    </h4>

                    <br>


                    <?php foreach (
                        $destino["comentarios"]
                        as $comentario
                    ): ?>

                        <div
                            style="
                                border-top:1px solid #ddd;
                                padding-top:10px;
                                margin-top:10px;
                            "
                        >

                            <strong>

                                <?= htmlspecialchars(
                                    $comentario["usuario_nombre"]
                                ) ?>

                            </strong>

                            <span>

                                -

                                <?= (int)$comentario["calificacion"] ?>

                                / 5

                            </span>

                            <p>

                                <?= htmlspecialchars(
                                    $comentario["comentario"]
                                ) ?>

                            </p>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>

</html>