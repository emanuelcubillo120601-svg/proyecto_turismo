<?php

class ClimaService
{
    public function obtenerClima($latitud, $longitud)
    {
        if (!$latitud || !$longitud) {
            return null;
        }

        $url =
            "https://api.open-meteo.com/v1/forecast"
            . "?latitude=" . urlencode($latitud)
            . "&longitude=" . urlencode($longitud)
            . "&current=temperature_2m,weather_code,wind_speed_10m"
            . "&timezone=auto";

        $respuesta = @file_get_contents($url);

        if ($respuesta === false) {
            return null;
        }

        $datos = json_decode($respuesta, true);

        if (!isset($datos["current"])) {
            return null;
        }

        return $datos["current"];
    }
}