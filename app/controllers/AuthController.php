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

        echo "Método no permitido.";
        return;

    }

    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["password"] ?? "";

    if (
        empty($correo) ||
        empty($password)
    ) {

        echo "Debe completar todos los campos.";
        return;

    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        echo "El correo electrónico no es válido.";
        return;

    }

    $database = new Database();

    $conexion = $database->conectar();

    if (!$conexion) {

        echo "No fue posible iniciar sesión.";
        return;

    }

    $usuarioModel = new Usuario($conexion);

    $usuario = $usuarioModel->buscarPorCorreo($correo);

    if (!$usuario) {

        echo "Correo o contraseña incorrectos.";
        return;

    }

    if (!password_verify($password, $usuario["password"])) {

        echo "Correo o contraseña incorrectos.";
        return;

    }

    if ((int)$usuario["estado"] !== 1) {

        echo "Esta cuenta se encuentra deshabilitada.";
        return;

    }

    session_regenerate_id(true);

    $_SESSION["usuario_id"] = $usuario["id"];

    $_SESSION["usuario_nombre"] = $usuario["nombre"];

    $_SESSION["usuario_correo"] = $usuario["correo"];

    $_SESSION["rol_id"] = $usuario["rol_id"];

    $_SESSION["rol"] = $usuario["rol"];

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
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {

        $params = session_get_cookie_params();

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
}
