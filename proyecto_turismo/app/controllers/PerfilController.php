<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Usuario.php";

class PerfilController
{
    private function obtenerModelo()
    {
        $database = new Database();

        $conexion = $database->conectar();

        return new Usuario($conexion);
    }


    public function index()
    {
        $modelo = $this->obtenerModelo();

        $usuario = $modelo->obtenerPorId(
            $_SESSION["usuario_id"]
        );

        require_once __DIR__ .
            "/../views/cliente/perfil.php";
    }


    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            header("Location: ?page=perfil");

            exit;
        }

        $nombre =
            trim($_POST["nombre"] ?? "");

        $correo =
            trim($_POST["correo"] ?? "");

        $telefono =
            trim($_POST["telefono"] ?? "");

        if ($nombre === "" || $correo === "") {

            $_SESSION["perfil_error"] =
                "Nombre y correo son obligatorios.";

            header("Location: ?page=perfil");

            exit;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            $_SESSION["perfil_error"] =
                "El correo electrónico no es válido.";

            header("Location: ?page=perfil");

            exit;
        }

        $modelo = $this->obtenerModelo();

        try {

            $modelo->actualizarPerfil(
                $_SESSION["usuario_id"],
                $nombre,
                $correo,
                $telefono
            );

            $_SESSION["usuario_nombre"] = $nombre;
            $_SESSION["usuario_correo"] = $correo;

            $_SESSION["perfil_exito"] =
                "Información actualizada correctamente.";

        } catch (PDOException $e) {

            $_SESSION["perfil_error"] =
                "No fue posible actualizar la información. Verifique que el correo no esté registrado por otra cuenta.";
        }

        header("Location: ?page=perfil");

        exit;
    }


    public function cambiarPassword()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            header("Location: ?page=perfil");

            exit;
        }

        $password =
            $_POST["password"] ?? "";

        $confirmar =
            $_POST["confirmar_password"] ?? "";

        if (strlen($password) < 8) {

            $_SESSION["perfil_error"] =
                "La contraseña debe tener al menos 8 caracteres.";

            header("Location: ?page=perfil");

            exit;
        }

        if ($password !== $confirmar) {

            $_SESSION["perfil_error"] =
                "Las contraseñas no coinciden.";

            header("Location: ?page=perfil");

            exit;
        }

        $hash =
            password_hash(
                $password,
                PASSWORD_DEFAULT
            );

        $modelo = $this->obtenerModelo();

        $modelo->actualizarPassword(
            $_SESSION["usuario_id"],
            $hash
        );

        $_SESSION["perfil_exito"] =
            "Contraseña actualizada correctamente.";

        header("Location: ?page=perfil");

        exit;
    }
}