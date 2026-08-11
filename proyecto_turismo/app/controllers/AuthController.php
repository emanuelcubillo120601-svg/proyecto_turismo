<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Usuario.php";

class AuthController
{
    public function registrar(): void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            echo "Método no permitido.";
            return;

        }

        CsrfHelper::validar();

        $nombre = trim($_POST["nombre"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");
        $password = $_POST["password"] ?? "";
        $confirmarPassword = $_POST["confirmar_password"] ?? "";

        if (
            empty($nombre) ||
            empty($correo) ||
            empty($password)
        ) {

            echo "Complete los campos obligatorios.";
            return;

        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            echo "El correo electrónico no es válido.";
            return;

        }

        if (strlen($password) < 8) {

            echo "La contraseña debe tener al menos 8 caracteres.";
            return;

        }

        if ($password !== $confirmarPassword) {

            echo "Las contraseñas no coinciden.";
            return;

        }

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $database = new Database();

        $conexion = $database->conectar();

        if (!$conexion) {

            echo "No fue posible procesar el registro.";
            return;

        }

        $usuario = new Usuario($conexion);
        if ($usuario->existeCorreo($correo)) {

               echo "Ya existe una cuenta registrada con este correo electrónico.";
               return;

}

        try {

            $resultado = $usuario->registrar(
                $nombre,
                $correo,
                $telefono,
                $passwordHash
            );

            if ($resultado) {

                echo "Usuario registrado correctamente.";

            }

        } catch (PDOException $e) {

            echo "No fue posible registrar el usuario.";

        }
    }
public function login(): void
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {

        header("Location: ?page=login");
        exit;
    }

    CsrfHelper::validar();

    $correo = trim(
        $_POST["correo"] ?? ""
    );

    $password =
        $_POST["password"] ?? "";


    if (
        $correo === "" ||
        $password === ""
    ) {

        $_SESSION["login_error"] =
            "Ingrese su correo y contraseña.";

        header("Location: ?page=login");
        exit;
    }


    if (!filter_var(
        $correo,
        FILTER_VALIDATE_EMAIL
    )) {

        $_SESSION["login_error"] =
            "Ingrese un correo electrónico válido.";

        header("Location: ?page=login");
        exit;
    }


    $database =
        new Database();

    $conexion =
        $database->conectar();


    if (!$conexion) {

        $_SESSION["login_error"] =
            "No fue posible iniciar sesión.";

        header("Location: ?page=login");
        exit;
    }


    $usuarioModel =
        new Usuario($conexion);


    $usuario =
        $usuarioModel->buscarPorCorreo(
            $correo
        );


    if (
        !$usuario ||
        !password_verify(
            $password,
            $usuario["password"]
        )
    ) {

        $_SESSION["login_error"] =
            "Correo o contraseña incorrectos.";

        header("Location: ?page=login");
        exit;
    }


    if ((int)$usuario["estado"] !== 1) {

        $_SESSION["login_error"] =
            "Esta cuenta se encuentra desactivada.";

        header("Location: ?page=login");
        exit;
    }


    session_regenerate_id(true);


    $_SESSION["usuario_id"] =
        $usuario["id"];

    $_SESSION["usuario_nombre"] =
        $usuario["nombre"];

    $_SESSION["usuario_correo"] =
        $usuario["correo"];

    $_SESSION["rol_id"] =
        $usuario["rol_id"];

    $_SESSION["rol"] =
        $usuario["rol"];


    if ((int)$usuario["rol_id"] === 1) {

        header(
            "Location: ?page=admin"
        );

        exit;
    }


    header(
        "Location: ?page=cliente"
    );

    exit;
}

public function logout(): void
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {

        http_response_code(405);

        exit("Método no permitido.");
    }

    CsrfHelper::validar();

    $_SESSION = [];

    if (ini_get("session.use_cookies")) {

        $params =
            session_get_cookie_params();

        setcookie(
            session_name(),
            "",
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header(
        "Location: ?page=login"
    );

    exit;
}

public function recuperarPassword()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    CsrfHelper::validar();


        $correo = trim(
            $_POST["correo"] ?? ""
        );

        if (
            $correo === "" ||
            !filter_var(
                $correo,
                FILTER_VALIDATE_EMAIL
            )
        ) {

            $error =
                "Ingrese un correo electrónico válido.";

            require_once __DIR__ .
                "/../views/auth/recuperar.php";

            return;
        }

        $database = new Database();

        $conexion = $database->conectar();

        $modelo = new Usuario($conexion);

        $usuario =
            $modelo->buscarPorCorreo($correo);

        /*
         * No revelamos si el correo existe
         * en el mensaje final.
         */
        if ($usuario) {

            $token =
                bin2hex(
                    random_bytes(32)
                );

            $tokenHash =
                hash("sha256", $token);

            $fechaExpiracion =
                date(
                    "Y-m-d H:i:s",
                    strtotime("+30 minutes")
                );

            $modelo->crearTokenRecuperacion(
                $usuario["id"],
                $tokenHash,
                $fechaExpiracion
            );

            /*
             * Como el proyecto no envía correo real,
             * mostramos el enlace para la demostración.
             */
            $enlaceRecuperacion =
                "?page=restablecer-password&token="
                . urlencode($token);
        }

        $mensaje =
            "Si el correo está registrado, se generó una solicitud de recuperación.";

        require_once __DIR__ .
            "/../views/auth/recuperar.php";

        return;
    }

    require_once __DIR__ .
        "/../views/auth/recuperar.php";
}


public function restablecerPassword()
{
    $token =
        $_GET["token"] ??
        $_POST["token"] ??
        "";

    if ($token === "") {

        echo "Token de recuperación inválido.";

        return;
    }

    $tokenHash =
        hash("sha256", $token);

    $database = new Database();

    $conexion = $database->conectar();

    $modelo = new Usuario($conexion);

    $registro =
        $modelo->buscarTokenValido(
            $tokenHash
        );

    if (!$registro) {

        echo "El enlace de recuperación no es válido o ha expirado.";

        return;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        CsrfHelper::validar();


        $password =
            $_POST["password"] ?? "";

        $confirmar =
            $_POST["confirmar_password"] ?? "";

        if (strlen($password) < 8) {

            $error =
                "La contraseña debe tener al menos 8 caracteres.";

            require_once __DIR__ .
                "/../views/auth/restablecer.php";

            return;
        }

        if ($password !== $confirmar) {

            $error =
                "Las contraseñas no coinciden.";

            require_once __DIR__ .
                "/../views/auth/restablecer.php";

            return;
        }

        $passwordHash =
            password_hash(
                $password,
                PASSWORD_DEFAULT
            );

        $modelo->actualizarPassword(
            $registro["usuario_id"],
            $passwordHash
        );

        $modelo->marcarTokenUsado(
            $registro["id"]
        );

        header(
            "Location: ?page=login&password=actualizada"
        );

        exit;
    }

    require_once __DIR__ .
        "/../views/auth/restablecer.php";
}

}
