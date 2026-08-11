<?php

require_once __DIR__ . "/../models/Actividad.php";
require_once __DIR__ . "/../models/Destino.php";

class ActividadController
{
    public function index()
    {
        $buscar = trim($_GET["buscar"] ?? "");

        $modelo = new Actividad();

        $actividades = $modelo->obtenerTodos($buscar);

        require_once __DIR__ .
            "/../views/admin/actividades/index.php";
    }


    public function crear()
    {
        $destinoModel = new Destino();

        $destinos = $destinoModel->obtenerTodos();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            CsrfHelper::validar();

            $destino_id =
                (int)($_POST["destino_id"] ?? 0);

            $nombre =
                trim($_POST["nombre"] ?? "");

            $descripcion =
                trim($_POST["descripcion"] ?? "");

            $precio =
                trim($_POST["precio"] ?? "");

            $duracion =
                trim($_POST["duracion"] ?? "");

            $cupo_maximo =
                (int)($_POST["cupo_maximo"] ?? 0);

            $imagen =
                trim($_POST["imagen"] ?? "");

            if (
                $destino_id <= 0 ||
                $nombre === "" ||
                $descripcion === "" ||
                $precio === "" ||
                $cupo_maximo <= 0
            ) {

                $error =
                    "Complete correctamente los campos obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/actividades/create.php";

                return;
            }

            if ((float)$precio < 0) {

                $error =
                    "El precio debe ser positivo.";

                require_once __DIR__ .
                    "/../views/admin/actividades/create.php";

                return;
            }

            $modelo = new Actividad();

            $modelo->crear(
                $destino_id,
                $nombre,
                $descripcion,
                $precio,
                $duracion,
                $cupo_maximo,
                $imagen
            );

            header(
                "Location: ?page=admin-actividades"
            );

            exit;
        }

        require_once __DIR__ .
            "/../views/admin/actividades/create.php";
    }


    public function editar()
    {
        $id =
            (int)($_GET["id"] ?? 0);

        $modelo =
            new Actividad();

        $actividad =
            $modelo->obtenerPorId($id);

        if (!$actividad) {

            exit("Actividad no encontrada.");
        }

        $destinoModel =
            new Destino();

        $destinos =
            $destinoModel->obtenerTodos();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            CsrfHelper::validar();

            $destino_id =
                (int)($_POST["destino_id"] ?? 0);

            $nombre =
                trim($_POST["nombre"] ?? "");

            $descripcion =
                trim($_POST["descripcion"] ?? "");

            $precio =
                trim($_POST["precio"] ?? "");

            $duracion =
                trim($_POST["duracion"] ?? "");

            $cupo_maximo =
                (int)($_POST["cupo_maximo"] ?? 0);

            $imagen =
                trim($_POST["imagen"] ?? "");

            if (
                $destino_id <= 0 ||
                $nombre === "" ||
                $descripcion === "" ||
                $precio === "" ||
                $cupo_maximo <= 0
            ) {

                $error =
                    "Complete correctamente los campos obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/actividades/edit.php";

                return;
            }

            $modelo->actualizar(
                $id,
                $destino_id,
                $nombre,
                $descripcion,
                $precio,
                $duracion,
                $cupo_maximo,
                $imagen
            );

            header(
                "Location: ?page=admin-actividades"
            );

            exit;
        }

        require_once __DIR__ .
            "/../views/admin/actividades/edit.php";
    }


    public function estado()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            http_response_code(405);

            exit("Método no permitido.");
        }

        CsrfHelper::validar();

        $id =
            (int)($_POST["id"] ?? 0);

        if ($id > 0) {

            $modelo =
                new Actividad();

            $modelo->cambiarEstado($id);
        }

        header(
            "Location: ?page=admin-actividades"
        );

        exit;
    }
}