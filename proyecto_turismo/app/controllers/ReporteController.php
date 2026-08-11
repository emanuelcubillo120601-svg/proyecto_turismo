<?php

require_once __DIR__ . "/../models/Reporte.php";

class ReporteController
{
    public function index()
    {
        $modelo = new Reporte();

        $totalUsuarios =
            $modelo->totalUsuarios();

        $totalReservaciones =
            $modelo->totalReservaciones();

        $ingresosEstimados =
            $modelo->ingresosEstimados();

        $hoteles =
            $modelo->hotelesMasReservados();

        $actividades =
            $modelo->actividadesMasSolicitadas();

        $destinos =
            $modelo->reservacionesPorDestino();

        $reservasFecha =
            $modelo->reservacionesPorFecha();

        require_once __DIR__ .
            "/../views/admin/reportes/index.php";
    }
}