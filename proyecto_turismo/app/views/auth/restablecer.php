<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nueva contraseña
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
            Nueva contraseña
        </h1>

        <p class="subtitle">
            Ingresa tu nueva contraseña.
        </p>


        <?php if (isset($error)): ?>

            <p>
                <?= htmlspecialchars($error) ?>
            </p>

            <br>

        <?php endif; ?>


        <form
            method="POST"
            action="?page=restablecer-password"
        >
         <?= CsrfHelper::input() ?>


            <input
                type="hidden"
                name="token"
                value="<?= htmlspecialchars($token) ?>"
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