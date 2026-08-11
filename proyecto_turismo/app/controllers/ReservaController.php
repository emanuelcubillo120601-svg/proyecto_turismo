<?php

require_once __DIR__ . "/../models/Reserva.php";

class ReservaController
{
    public function crear()
    {
        $modelo = new Reserva();

        $hoteles =
            $modelo->obtenerHotelesActivos();

        $actividades =
            $modelo->obtenerActividadesActivas();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $hotel_id =
                (int)($_POST["hotel_id"] ?? 0);

            $fecha_entrada =
                $_POST["fecha_entrada"] ?? "";

            $fecha_salida =
                $_POST["fecha_salida"] ?? "";

            $cantidad_personas =
                (int)($_POST["cantidad_personas"] ?? 0);

            $actividadesSeleccionadas =
                $_POST["actividades"] ?? [];

            if (
                $hotel_id <= 0 ||
                $fecha_entrada === "" ||
                $fecha_salida === "" ||
                $cantidad_personas <= 0
            ) {

                $error =
                    "Complete correctamente los campos obligatorios.";

                require_once __DIR__ .
                    "/../views/cliente/reservas/create.php";

                return;
            }

            if ($fecha_salida <= $fecha_entrada) {

                $error =
                    "La fecha de salida debe ser posterior a la entrada.";

                require_once __DIR__ .
                    "/../views/cliente/reservas/create.php";

                return;
            }

            $resultado =
                $modelo->crear(
                    $_SESSION["usuario_id"],
                    $hotel_id,
                    $fecha_entrada,
                    $fecha_salida,
                    $cantidad_personas,
                    $actividadesSeleccionadas
                );

            if (!$resultado) {

                $error =
                    "No fue posible realizar la reservación.";

                require_once __DIR__ .
                    "/../views/cliente/reservas/create.php";

                return;
            }

            header(
                "Location: ?page=mis-reservas"
            );

            exit;
        }

        require_once __DIR__ .
            "/../views/cliente/reservas/create.php";
    }

    public function misReservas()
    {
        $modelo = new Reserva();

        $reservas =
            $modelo->obtenerPorUsuario(
                $_SESSION["usuario_id"]
            );

        require_once __DIR__ .
            "/../views/cliente/reservas/index.php";
    }

    public function admin()
    {
        $modelo = new Reserva();

        $reservas =
            $modelo->obtenerTodas();

        require_once __DIR__ .
            "/../views/admin/reservas/index.php";
    }
}