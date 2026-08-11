<?php

require_once __DIR__ . "/../config/database.php";

class Reporte
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();

        $this->conexion = $database->conectar();
    }

    public function totalUsuarios()
    {
        $sql = "SELECT COUNT(*) AS total
                FROM usuarios";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }

    public function totalReservaciones()
    {
        $sql = "SELECT COUNT(*) AS total
                FROM reservaciones";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }

    public function ingresosEstimados()
    {
        $sql = "SELECT
                    COALESCE(SUM(total_estimado), 0) AS total
                FROM reservaciones";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }

    public function hotelesMasReservados()
    {
        $sql = "SELECT
                    hoteles.nombre,
                    COUNT(reservaciones.id) AS cantidad
                FROM reservaciones

                INNER JOIN hoteles
                    ON reservaciones.hotel_id = hoteles.id

                GROUP BY hoteles.id, hoteles.nombre

                ORDER BY cantidad DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actividadesMasSolicitadas()
    {
        $sql = "SELECT
                    actividades.nombre,
                    COUNT(reservacion_actividades.id) AS cantidad
                FROM reservacion_actividades

                INNER JOIN actividades
                    ON reservacion_actividades.actividad_id = actividades.id

                GROUP BY actividades.id, actividades.nombre

                ORDER BY cantidad DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reservacionesPorDestino()
    {
        $sql = "SELECT
                    destinos.nombre,
                    COUNT(reservaciones.id) AS cantidad
                FROM reservaciones

                INNER JOIN hoteles
                    ON reservaciones.hotel_id = hoteles.id

                INNER JOIN destinos
                    ON hoteles.destino_id = destinos.id

                GROUP BY destinos.id, destinos.nombre

                ORDER BY cantidad DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reservacionesPorFecha()
    {
        $sql = "SELECT
                    DATE(fecha_registro) AS fecha,
                    COUNT(*) AS cantidad
                FROM reservaciones

                GROUP BY DATE(fecha_registro)

                ORDER BY fecha DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}