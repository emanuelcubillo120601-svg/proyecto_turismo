<?php

require_once __DIR__ . "/../models/Destino.php";
require_once __DIR__ . "/../models/Hotel.php";
require_once __DIR__ . "/../models/Actividad.php";
require_once __DIR__ . "/../services/ClimaService.php";
require_once __DIR__ . "/../services/MonedaService.php";
require_once __DIR__ . "/../models/Comentario.php";

class ClienteController
{

public function destinos()
{
    $modelo =
        new Destino();

    $destinos =
        $modelo->obtenerActivos();

    $climaService =
        new ClimaService();

    $comentarioModel =
        new Comentario();

    foreach ($destinos as &$destino) {

        $destino["clima"] =
            $climaService->obtenerClima(
                $destino["latitud"],
                $destino["longitud"]
            );

        $destino["comentarios"] =
            $comentarioModel->obtenerPorDestino(
                $destino["id"]
            );

        $destino["promedio"] =
            $comentarioModel->promedioPorDestino(
                $destino["id"]
            );
    }

    unset($destino);

    require_once __DIR__ .
        "/../views/cliente/destinos.php";
}

    public function hoteles()
    {
            $modelo = new Hotel();

            $hoteles = $modelo->obtenerActivos();

            $monedaService = new MonedaService();

            foreach ($hoteles as &$hotel) {

                $hotel["precio_usd"] =
                    $monedaService->crcAUsd(
                        $hotel["precio_noche"]
                    );
            }

            unset($hotel);

            require_once __DIR__ .
                "/../views/cliente/hoteles.php";
    }

    public function actividades()
    {
            $modelo = new Actividad();

            $actividades = $modelo->obtenerActivas();

            $monedaService = new MonedaService();

            foreach ($actividades as &$actividad) {

                $actividad["precio_usd"] =
                    $monedaService->crcAUsd(
                        $actividad["precio"]
                    );
            }

            unset($actividad);

            require_once __DIR__ .
                "/../views/cliente/actividades.php";
    }
}