<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mi perfil</title>

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

    <div class="welcome">

        <h1>
            Mi perfil
        </h1>

        <p>
            Administra tu información personal.
        </p>

    </div>


    <?php if (isset($_SESSION["perfil_exito"])): ?>

        <p>
            <?= htmlspecialchars($_SESSION["perfil_exito"]) ?>
        </p>

        <?php unset($_SESSION["perfil_exito"]); ?>

    <?php endif; ?>


    <?php if (isset($_SESSION["perfil_error"])): ?>

        <p>
            <?= htmlspecialchars($_SESSION["perfil_error"]) ?>
        </p>

        <?php unset($_SESSION["perfil_error"]); ?>

    <?php endif; ?>


    <section
        class="dashboard-card"
        style="margin-bottom:25px;"
    >

        <h3>
            Información personal
        </h3>

        <br>


        <form
            method="POST"
            action="?page=perfil-actualizar"
        >

            <div class="form-group">

                <label>
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="<?= htmlspecialchars($usuario["nombre"]) ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Correo electrónico
                </label>

                <input
                    type="email"
                    name="correo"
                    value="<?= htmlspecialchars($usuario["correo"]) ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Teléfono
                </label>

                <input
                    type="text"
                    name="telefono"
                    value="<?= htmlspecialchars($usuario["telefono"] ?? "") ?>"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                Guardar cambios
            </button>

        </form>

    </section>


    <section class="dashboard-card">

        <h3>
            Cambiar contraseña
        </h3>

        <br>


        <form
            method="POST"
            action="?page=perfil-password"
        >

            <div class="form-group">

                <label>
                    Nueva contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    minlength="8"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Confirmar contraseña
                </label>

                <input
                    type="password"
                    name="confirmar_password"
                    minlength="8"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                Cambiar contraseña
            </button>

        </form>

    </section>

</main>

</body>
</html>