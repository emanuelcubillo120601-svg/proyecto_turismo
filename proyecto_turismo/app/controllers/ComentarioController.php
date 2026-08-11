<?php

require_once __DIR__ . "/../models/Comentario.php";

class ComentarioController
{
    public function crear()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            http_response_code(405);

            exit("Método no permitido.");
        }

        CsrfHelper::validar();

        $destinoId =
            (int)($_POST["destino_id"] ?? 0);

        $comentario =
            trim($_POST["comentario"] ?? "");

        $calificacion =
            (int)($_POST["calificacion"] ?? 0);

        if (
            $destinoId <= 0 ||
            $comentario === "" ||
            $calificacion < 1 ||
            $calificacion > 5
        ) {

            $_SESSION["comentario_error"] =
                "Complete correctamente el comentario y la calificación.";

            header(
                "Location: ?page=destinos"
            );

            exit;
        }

        $modelo =
            new Comentario();

        $modelo->crear(
            $_SESSION["usuario_id"],
            $destinoId,
            $comentario,
            $calificacion
        );

        $_SESSION["comentario_exito"] =
            "Comentario registrado correctamente.";

        header(
            "Location: ?page=destinos"
        );

        exit;
    }
}