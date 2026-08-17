<?php

require_once __DIR__ .
    "/../models/Hotel.php";

require_once __DIR__ .
    "/../models/Destino.php";

require_once __DIR__ .
    "/../helpers/ImagenHelper.php";


class HotelController
{
    public function index()
    {
        $buscar =
            trim($_GET["buscar"] ?? "");


        $modelo =
            new Hotel();


        $hoteles =
            $modelo->obtenerTodos($buscar);


        require_once __DIR__ .
            "/../views/admin/hoteles/index.php";
    }


    public function crear()
    {
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


            $categoria =
                trim($_POST["categoria"] ?? "");


            $direccion =
                trim($_POST["direccion"] ?? "");


            $telefono =
                trim($_POST["telefono"] ?? "");


            $correo =
                trim($_POST["correo"] ?? "");


            $precio_noche =
                trim($_POST["precio_noche"] ?? "");


            $cantidad_habitaciones =
                (int)($_POST["cantidad_habitaciones"] ?? 0);


            $descripcion =
                trim($_POST["descripcion"] ?? "");


            if (
                $destino_id <= 0 ||
                $nombre === "" ||
                $direccion === "" ||
                $precio_noche === "" ||
                $cantidad_habitaciones <= 0
            ) {

                $error =
                    "Complete correctamente los campos obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/hoteles/create.php";

                return;
            }


            if (
                $correo !== "" &&
                !filter_var(
                    $correo,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $error =
                    "El correo electrónico no es válido.";

                require_once __DIR__ .
                    "/../views/admin/hoteles/create.php";

                return;
            }


            $imagen = null;


            try {

                $imagen =
                    ImagenHelper::subir(
                        $_FILES["imagen"] ?? [],
                        "hoteles"
                    );

            } catch (Exception $e) {

                $error =
                    $e->getMessage();

                require_once __DIR__ .
                    "/../views/admin/hoteles/create.php";

                return;
            }


            $modelo =
                new Hotel();


            $modelo->crear(
                $destino_id,
                $nombre,
                $categoria,
                $direccion,
                $telefono,
                $correo,
                $precio_noche,
                $cantidad_habitaciones,
                $descripcion,
                $imagen
            );


            header(
                "Location: ?page=admin-hoteles"
            );

            exit;
        }


        require_once __DIR__ .
            "/../views/admin/hoteles/create.php";
    }


    public function editar()
    {
        $id =
            (int)($_GET["id"] ?? 0);


        $modelo =
            new Hotel();


        $hotel =
            $modelo->obtenerPorId($id);


        if (!$hotel) {

            exit(
                "Hotel no encontrado."
            );
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


            $categoria =
                trim($_POST["categoria"] ?? "");


            $direccion =
                trim($_POST["direccion"] ?? "");


            $telefono =
                trim($_POST["telefono"] ?? "");


            $correo =
                trim($_POST["correo"] ?? "");


            $precio_noche =
                trim($_POST["precio_noche"] ?? "");


            $cantidad_habitaciones =
                (int)($_POST["cantidad_habitaciones"] ?? 0);


            $descripcion =
                trim($_POST["descripcion"] ?? "");


            if (
                $destino_id <= 0 ||
                $nombre === "" ||
                $direccion === "" ||
                $precio_noche === "" ||
                $cantidad_habitaciones <= 0
            ) {

                $error =
                    "Complete correctamente los campos obligatorios.";

                require_once __DIR__ .
                    "/../views/admin/hoteles/edit.php";

                return;
            }


            if (
                $correo !== "" &&
                !filter_var(
                    $correo,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $error =
                    "El correo electrónico no es válido.";

                require_once __DIR__ .
                    "/../views/admin/hoteles/edit.php";

                return;
            }


            $imagen =
                $hotel["imagen"] ?? null;


            try {

                $imagen =
                    ImagenHelper::subir(
                        $_FILES["imagen"] ?? [],
                        "hoteles",
                        $hotel["imagen"] ?? null
                    );

            } catch (Exception $e) {

                $error =
                    $e->getMessage();

                require_once __DIR__ .
                    "/../views/admin/hoteles/edit.php";

                return;
            }


            $modelo->actualizar(
                $id,
                $destino_id,
                $nombre,
                $categoria,
                $direccion,
                $telefono,
                $correo,
                $precio_noche,
                $cantidad_habitaciones,
                $descripcion,
                $imagen
            );


            header(
                "Location: ?page=admin-hoteles"
            );

            exit;
        }


        require_once __DIR__ .
            "/../views/admin/hoteles/edit.php";
    }


    public function estado()
    {
        if (
            $_SERVER["REQUEST_METHOD"] !== "POST"
        ) {

            http_response_code(405);

            exit(
                "Método no permitido."
            );
        }


        CsrfHelper::validar();


        $id =
            (int)($_POST["id"] ?? 0);


        if ($id > 0) {

            $modelo =
                new Hotel();

            $modelo->cambiarEstado($id);
        }


        header(
            "Location: ?page=admin-hoteles"
        );

        exit;
    }
}