<?php

require_once __DIR__ . "/../models/Favorito.php";

class FavoritoController
{
    public function alternar()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {

            http_response_code(405);

            exit("Método no permitido.");
        }

        CsrfHelper::validar();

        $destinoId =
            (int)($_POST["id"] ?? 0);

        if ($destinoId <= 0) {

            header("Location: ?page=destinos");

            exit;
        }

        $modelo = new Favorito();

        $resultado = $modelo->alternar(
            $_SESSION["usuario_id"],
            $destinoId
        );

        if ($resultado) {

            $_SESSION["favorito_mensaje"] =
                "Lista de favoritos actualizada.";

        } else {

            $_SESSION["favorito_error"] =
                "No fue posible actualizar favoritos.";
        }

        header("Location: ?page=destinos");

        exit;
    }


    public function index()
    {
        $modelo = new Favorito();

        $favoritos =
            $modelo->obtenerPorUsuario(
                $_SESSION["usuario_id"]
            );

        require_once __DIR__ .
            "/../views/cliente/favoritos.php";
    }
}