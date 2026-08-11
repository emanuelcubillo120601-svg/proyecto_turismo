<?php

class MonedaService
{
    public function crcAUsd($montoCRC)
    {
        $url =
            "https://api.frankfurter.dev/v2/rate/USD/CRC";

        $respuesta = @file_get_contents($url);

        if ($respuesta === false) {
            return null;
        }

        $datos = json_decode($respuesta, true);

        if (!isset($datos["rate"])) {
            return null;
        }

        $crcPorDolar = (float)$datos["rate"];

        if ($crcPorDolar <= 0) {
            return null;
        }

        return $montoCRC / $crcPorDolar;
    }
}