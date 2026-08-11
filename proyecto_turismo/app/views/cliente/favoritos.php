<?php
/** @var array $favoritos */
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
        Mis favoritos | Costa Rica Travel
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
        Volver al inicio
    </a>

</header>


<main class="dashboard-container">

    <section class="welcome">

        <h1>
            Mis destinos favoritos
        </h1>

        <p>
            Aquí encontrarás los destinos que has guardado.
        </p>

    </section>


    <?php if (empty($favoritos)): ?>

        <div class="dashboard-card">

            <p>
                Todavía no has agregado destinos a favoritos.
            </p>

            <br>

            <a
                href="?page=destinos"
                class="btn btn-primary"
                style="width:auto;"
            >
                Explorar destinos
            </a>

        </div>


    <?php else: ?>


        <section class="dashboard-grid">

            <?php foreach ($favoritos as $destino): ?>

                <div class="dashboard-card">

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
                            Quitar de favoritos
                        </button>

                    </form>

                </div>

            <?php endforeach; ?>

        </section>


    <?php endif; ?>

</main>


</body>

</html>