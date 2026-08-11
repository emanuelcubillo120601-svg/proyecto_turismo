<?php

class CsrfHelper
{
    public static function token(): string
    {
        if (
            empty($_SESSION["csrf_token"])
        ) {
            $_SESSION["csrf_token"] =
                bin2hex(random_bytes(32));
        }

        return $_SESSION["csrf_token"];
    }


    public static function input(): string
    {
        $token = htmlspecialchars(
            self::token(),
            ENT_QUOTES,
            "UTF-8"
        );

        return '<input type="hidden" name="csrf_token" value="' .
            $token .
            '">';
    }


    public static function validar(): void
    {
        $tokenSesion =
            $_SESSION["csrf_token"] ?? "";

        $tokenFormulario =
            $_POST["csrf_token"] ?? "";

        if (
            $tokenSesion === "" ||
            $tokenFormulario === "" ||
            !hash_equals(
                $tokenSesion,
                $tokenFormulario
            )
        ) {
            http_response_code(419);

            exit(
                "Solicitud no válida. Recargue la página e intente nuevamente."
            );
        }
    }


    public static function regenerar(): void
    {
        $_SESSION["csrf_token"] =
            bin2hex(random_bytes(32));
    }
}