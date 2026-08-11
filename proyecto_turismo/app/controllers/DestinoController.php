<?php

require_once __DIR__ . "/../models/Destino.php";

class DestinoController
{
    public function index()
    {
        $buscar = trim($_GET["buscar"] ?? "");

        $modelo = new Destino();

        $destinos = $modelo->obtenerTodos($buscar);

        require_once __DIR__ .
            "/../views/admin/destinos/index.php";
    }

    public function crear()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nombre = trim($_POST["nombre"] ?? "");
            $provincia = trim($_POST["provincia"] ?? "");
            $descripcion = trim($_POST["descripcion"] ?? "");
            $imagen = trim($_POST["imagen"] ?? "");
            $latitud = trim($_POST["latitud"] ?? "");
            $longitud = trim($_POST["longitud"] ?? "");

            if (
                $nombre === "" ||
                $provincia === "" ||
                $descripcion === ""
            ) {

                $error =
                    "Nombre, provincia y descripción son obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/destinos/create.php";

                return;
            }

            $modelo = new Destino();

            $modelo->crear(
                $nombre,
                $provincia,
                $descripcion,
                $imagen,
                $latitud !== "" ? $latitud : null,
                $longitud !== "" ? $longitud : null
            );

            header(
                "Location: ?page=admin-destinos"
            );

            exit;
        }

        require_once __DIR__ .
            "/../views/admin/destinos/create.php";
    }

    public function editar()
    {
        $id = (int)($_GET["id"] ?? 0);

        $modelo = new Destino();

        $destino = $modelo->obtenerPorId($id);

        if (!$destino) {
            echo "Destino no encontrado.";
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nombre = trim($_POST["nombre"] ?? "");
            $provincia = trim($_POST["provincia"] ?? "");
            $descripcion = trim($_POST["descripcion"] ?? "");
            $imagen = trim($_POST["imagen"] ?? "");
            $latitud = trim($_POST["latitud"] ?? "");
            $longitud = trim($_POST["longitud"] ?? "");

            if (
                $nombre === "" ||
                $provincia === "" ||
                $descripcion === ""
            ) {

                $error =
                    "Nombre, provincia y descripción son obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/destinos/edit.php";

                return;
            }

            $modelo->actualizar(
                $id,
                $nombre,
                $provincia,
                $descripcion,
                $imagen,
                $latitud !== "" ? $latitud : null,
                $longitud !== "" ? $longitud : null
            );

            header(
                "Location: ?page=admin-destinos"
            );

            exit;
        }

        require_once __DIR__ .
            "/../views/admin/destinos/edit.php";
    }

    public function estado()
    {
        $id = (int)($_GET["id"] ?? 0);

        if ($id > 0) {

            $modelo = new Destino();

            $modelo->cambiarEstado($id);
        }

        header(
            "Location: ?page=admin-destinos"
        );

        exit;
    }
}