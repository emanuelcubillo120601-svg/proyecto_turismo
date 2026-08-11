<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
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

        $usuarios = $modelo->obtenerTodos();

        require_once __DIR__ .
            "/../views/admin/usuarios/index.php";
    }


    public function estado()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            http_response_code(405);

            exit("Método no permitido.");
        }

        CsrfHelper::validar();

        $id = (int)($_POST["id"] ?? 0);

        if (
            $id > 0 &&
            $id !== (int)$_SESSION["usuario_id"]
        ) {

            $modelo = $this->obtenerModelo();

            $modelo->cambiarEstado($id);
        }

        header(
            "Location: ?page=admin-usuarios"
        );

        exit;
    }
}