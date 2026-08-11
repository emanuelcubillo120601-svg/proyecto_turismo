<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Iniciar sesión | Costa Rica Travel
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
                Costa Rica Travel
            </h1>

            <p class="subtitle">
                Inicia sesión para continuar
            </p>

            <form
                action="?page=procesar-login"
                method="POST"
            >

                <div class="form-group">

                    <label for="correo">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        placeholder="ejemplo@correo.com"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="password">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    Iniciar sesión

                </button>

            </form>

            <div class="auth-footer">

                <p>
                    ¿No tienes una cuenta?

                    <a href="?page=registro">
                        Regístrate
                    </a>
                </p>

            </div>

        </section>

    </main>

</body>

</html>