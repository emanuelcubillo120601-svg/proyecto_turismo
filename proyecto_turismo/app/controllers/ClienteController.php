<?php

require_once __DIR__ . "/../models/Destino.php";
require_once __DIR__ . "/../models/Hotel.php";
require_once __DIR__ . "/../models/Actividad.php";

class ClienteController
{
    public function destinos()
    {
        $modelo = new Destino();

        $destinos = $modelo->obtenerActivos();

        require_once __DIR__ .
            "/../views/cliente/destinos.php";
    }

    public function hoteles()
    {
        $modelo = new Hotel();

        $hoteles = $modelo->obtenerActivos();

        require_once __DIR__ .
            "/../views/cliente/hoteles.php";
    }

    public function actividades()
    {
        $modelo = new Actividad();

        $actividades = $modelo->obtenerActivas();

        require_once __DIR__ .
            "/../views/cliente/actividades.php";
    }
}