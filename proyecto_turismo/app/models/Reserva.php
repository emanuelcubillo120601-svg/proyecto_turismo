<?php

require_once __DIR__ . "/../config/database.php";

class Reserva
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();

        $this->conexion = $database->conectar();
    }

    public function obtenerHotelesActivos()
    {
        $sql = "SELECT
                    hoteles.id,
                    hoteles.nombre,
                    hoteles.precio_noche,
                    destinos.nombre AS destino_nombre
                FROM hoteles

                INNER JOIN destinos
                    ON hoteles.destino_id = destinos.id

                WHERE hoteles.estado = 1

                ORDER BY hoteles.nombre";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerActividadesActivas()
    {
        $sql = "SELECT
                    actividades.id,
                    actividades.nombre,
                    actividades.precio,
                    destinos.nombre AS destino_nombre
                FROM actividades

                INNER JOIN destinos
                    ON actividades.destino_id = destinos.id

                WHERE actividades.estado = 1

                ORDER BY actividades.nombre";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerHotelPorId($id)
    {
        $sql = "SELECT *
                FROM hoteles
                WHERE id = :id
                AND estado = 1
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerActividadPorId($id)
    {
        $sql = "SELECT *
                FROM actividades
                WHERE id = :id
                AND estado = 1
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $usuario_id,
        $hotel_id,
        $fecha_entrada,
        $fecha_salida,
        $cantidad_personas,
        $actividades
    ) {
        try {

            $this->conexion->beginTransaction();

            $hotel =
                $this->obtenerHotelPorId($hotel_id);

            if (!$hotel) {
                throw new Exception(
                    "El hotel seleccionado no existe."
                );
            }

            $entrada =
                new DateTime($fecha_entrada);

            $salida =
                new DateTime($fecha_salida);

            $dias =
                $entrada->diff($salida)->days;

            if ($dias <= 0) {
                throw new Exception(
                    "Las fechas no son válidas."
                );
            }

            $totalHotel =
                $dias * (float)$hotel["precio_noche"];

            $totalActividades = 0;

            $actividadesValidas = [];

            foreach ($actividades as $actividad_id) {

                $actividad =
                    $this->obtenerActividadPorId(
                        $actividad_id
                    );

                if ($actividad) {

                    $subtotal =
                        (float)$actividad["precio"]
                        * $cantidad_personas;

                    $totalActividades += $subtotal;

                    $actividadesValidas[] = [
                        "id" => $actividad["id"],
                        "precio" => $actividad["precio"],
                        "subtotal" => $subtotal
                    ];
                }
            }

            $total =
                $totalHotel + $totalActividades;

            $sql = "INSERT INTO reservaciones
                    (
                        usuario_id,
                        hotel_id,
                        fecha_entrada,
                        fecha_salida,
                        cantidad_personas,
                        total_estimado
                    )
                    VALUES
                    (
                        :usuario_id,
                        :hotel_id,
                        :fecha_entrada,
                        :fecha_salida,
                        :cantidad_personas,
                        :total_estimado
                    )";

            $stmt =
                $this->conexion->prepare($sql);

            $stmt->execute([
                ":usuario_id" => $usuario_id,
                ":hotel_id" => $hotel_id,
                ":fecha_entrada" => $fecha_entrada,
                ":fecha_salida" => $fecha_salida,
                ":cantidad_personas" => $cantidad_personas,
                ":total_estimado" => $total
            ]);

            $reservacion_id =
                $this->conexion->lastInsertId();

            foreach ($actividadesValidas as $actividad) {

                $sqlActividad =
                    "INSERT INTO reservacion_actividades
                    (
                        reservacion_id,
                        actividad_id,
                        cantidad_personas,
                        precio_unitario,
                        subtotal
                    )
                    VALUES
                    (
                        :reservacion_id,
                        :actividad_id,
                        :cantidad_personas,
                        :precio_unitario,
                        :subtotal
                    )";

                $stmtActividad =
                    $this->conexion->prepare(
                        $sqlActividad
                    );

                $stmtActividad->execute([
                    ":reservacion_id" => $reservacion_id,
                    ":actividad_id" => $actividad["id"],
                    ":cantidad_personas" => $cantidad_personas,
                    ":precio_unitario" => $actividad["precio"],
                    ":subtotal" => $actividad["subtotal"]
                ]);
            }

            $this->conexion->commit();

            return true;

        } catch (Throwable $e) {

            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }

            return false;
        }
    }

    public function obtenerPorUsuario($usuario_id)
    {
        $sql = "SELECT
                    reservaciones.*,
                    hoteles.nombre AS hotel_nombre,
                    destinos.nombre AS destino_nombre
                FROM reservaciones

                INNER JOIN hoteles
                    ON reservaciones.hotel_id = hoteles.id

                INNER JOIN destinos
                    ON hoteles.destino_id = destinos.id

                WHERE reservaciones.usuario_id = :usuario_id

                ORDER BY reservaciones.id DESC";

        $stmt =
            $this->conexion->prepare($sql);

        $stmt->execute([
            ":usuario_id" => $usuario_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodas()
    {
        $sql = "SELECT
                    reservaciones.*,
                    usuarios.nombre AS usuario_nombre,
                    hoteles.nombre AS hotel_nombre,
                    destinos.nombre AS destino_nombre

                FROM reservaciones

                INNER JOIN usuarios
                    ON reservaciones.usuario_id = usuarios.id

                INNER JOIN hoteles
                    ON reservaciones.hotel_id = hoteles.id

                INNER JOIN destinos
                    ON hoteles.destino_id = destinos.id

                ORDER BY reservaciones.id DESC";

        $stmt =
            $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}