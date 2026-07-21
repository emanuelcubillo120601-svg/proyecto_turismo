<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Iniciar sesión | Costa Rica Travel</title>

</head>

<body>

    <h1>Iniciar sesión</h1>

    <form
        action="?page=procesar-login"
        method="POST"
    >

        <label>Correo electrónico</label>

        <br>

        <input
            type="email"
            name="correo"
            required
        >

        <br><br>

        <label>Contraseña</label>

        <br>

        <input
            type="password"
            name="password"
            required
        >

        <br><br>

        <button type="submit">

            Iniciar sesión

        </button>

    </form>

    <p>
        ¿No tienes una cuenta?

        <a href="?page=registro">
            Regístrate
        </a>
    </p>

</body>

</html>