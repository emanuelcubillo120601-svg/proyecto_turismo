<?php

require_once __DIR__ .
    "/../models/Bitacora.php";

class BitacoraController
{
    public function index()
    {
        $modelo =
            new Bitacora();

        $registros =
            $modelo->obtenerTodas();

        require_once __DIR__ .
            "/../views/admin/bitacora/index.php";
    }
}