<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Recuperar contraseña
    </title>

    <link
        rel="stylesheet"
        href="/proyecto_turismo/public/css/styles.css"
    >

</head>

<body>

<main class="auth-container">

    <section class="auth-card">

        <h1>
            Recuperar contraseña
        </h1>

        <p class="subtitle">
            Ingresa el correo asociado a tu cuenta.
        </p>


        <?php if (isset($error)): ?>

            <p>
                <?= htmlspecialchars($error) ?>
            </p>

            <br>

        <?php endif; ?>


        <?php if (isset($mensaje)): ?>

            <p>
                <?= htmlspecialchars($mensaje) ?>
            </p>

            <br>

        <?php endif; ?>


        <form
            method="POST"
            action="?page=recuperar-password"
        >

            <div class="form-group">

                <label>
                    Correo electrónico
                </label>

                <input
                    type="email"
                    name="correo"
                    required
                >

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Recuperar contraseña
            </button>

        </form>


        <?php if (isset($enlaceRecuperacion)): ?>

            <br>

            <p>
                <strong>
                    Enlace de recuperación de prueba:
                </strong>
            </p>

            <p>
                <a href="<?= htmlspecialchars($enlaceRecuperacion) ?>">
                    Restablecer contraseña
                </a>
            </p>

        <?php endif; ?>


        <div class="auth-footer">

            <a href="?page=login">
                Volver al inicio de sesión
            </a>

        </div>

    </section>

</main>

</body>
</html>