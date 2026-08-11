<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Registro | Costa Rica Travel
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
                Crear cuenta
            </h1>

            <p class="subtitle">
                Regístrate para explorar Costa Rica
            </p>

            <form
                action="?page=procesar-registro"
                method="POST"
            >

                <div class="form-group">

                    <label for="nombre">
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="correo">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="telefono">
                        Teléfono
                    </label>

                    <input
                        type="text"
                        id="telefono"
                        name="telefono"
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
                        minlength="8"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="confirmar_password">
                        Confirmar contraseña
                    </label>

                    <input
                        type="password"
                        id="confirmar_password"
                        name="confirmar_password"
                        minlength="8"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    Crear cuenta

                </button>

            </form>

            <div class="auth-footer">

                <p>
                    ¿Ya tienes una cuenta?

                    <a href="?page=login">
                        Iniciar sesión
                    </a>
                </p>

            </div>

        </section>

    </main>

</body>

</html>