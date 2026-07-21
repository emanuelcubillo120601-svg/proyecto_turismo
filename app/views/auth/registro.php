<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Registro | Costa Rica Travel</title>

</head>

<body>

    <h1>Crear cuenta</h1>

        <form
            action="?page=procesar-registro"
            method="POST"
>
    >

        <label>Nombre completo</label>
        <br>

        <input
            type="text"
            name="nombre"
            required
        >

        <br><br>

        <label>Correo electrónico</label>
        <br>

        <input
            type="email"
            name="correo"
            required
        >

        <br><br>

        <label>Teléfono</label>
        <br>

        <input
            type="text"
            name="telefono"
        >

        <br><br>

        <label>Contraseña</label>
        <br>

        <input
            type="password"
            name="password"
            minlength="8"
            required
        >

        <br><br>

        <label>Confirmar contraseña</label>
        <br>

        <input
            type="password"
            name="confirmar_password"
            minlength="8"
            required
        >

        <br><br>

        <button type="submit">

            Registrarme

        </button>
        <p>
           ¿Ya tienes una cuenta?

            <a href="?page=login">
                Iniciar sesión
            </a>
        </p>

    </form>

</body>

</html>