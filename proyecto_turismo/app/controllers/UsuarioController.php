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
        $id =
            (int)($_GET["id"] ?? 0);

        /*
         * Evitamos que el administrador
         * se desactive a sí mismo.
         */
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