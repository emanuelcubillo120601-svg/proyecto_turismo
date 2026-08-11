<?php

require_once __DIR__ . "/../config/database.php";

class Actividad
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();

        $this->conexion = $database->conectar();
    }

    public function obtenerTodos($buscar = "")
    {
        if ($buscar !== "") {

            $sql = "SELECT
                        actividades.*,
                        destinos.nombre AS destino_nombre
                    FROM actividades

                    INNER JOIN destinos
                        ON actividades.destino_id = destinos.id

                    WHERE actividades.nombre LIKE :buscar
                    OR destinos.nombre LIKE :buscar

                    ORDER BY actividades.id DESC";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute([
                ":buscar" => "%" . $buscar . "%"
            ]);

        } else {

            $sql = "SELECT
                        actividades.*,
                        destinos.nombre AS destino_nombre
                    FROM actividades

                    INNER JOIN destinos
                        ON actividades.destino_id = destinos.id

                    ORDER BY actividades.id DESC";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM actividades
                WHERE id = :id
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $destino_id,
        $nombre,
        $descripcion,
        $precio,
        $duracion,
        $cupo_maximo,
        $imagen
    ) {
        $sql = "INSERT INTO actividades
                (
                    destino_id,
                    nombre,
                    descripcion,
                    precio,
                    duracion,
                    cupo_maximo,
                    imagen
                )
                VALUES
                (
                    :destino_id,
                    :nombre,
                    :descripcion,
                    :precio,
                    :duracion,
                    :cupo_maximo,
                    :imagen
                )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":destino_id" => $destino_id,
            ":nombre" => $nombre,
            ":descripcion" => $descripcion,
            ":precio" => $precio,
            ":duracion" => $duracion,
            ":cupo_maximo" => $cupo_maximo,
            ":imagen" => $imagen
        ]);
    }

    public function actualizar(
        $id,
        $destino_id,
        $nombre,
        $descripcion,
        $precio,
        $duracion,
        $cupo_maximo,
        $imagen
    ) {
        $sql = "UPDATE actividades
                SET
                    destino_id = :destino_id,
                    nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    duracion = :duracion,
                    cupo_maximo = :cupo_maximo,
                    imagen = :imagen

                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":id" => $id,
            ":destino_id" => $destino_id,
            ":nombre" => $nombre,
            ":descripcion" => $descripcion,
            ":precio" => $precio,
            ":duracion" => $duracion,
            ":cupo_maximo" => $cupo_maximo,
            ":imagen" => $imagen
        ]);
    }

    public function cambiarEstado($id)
    {
        $sql = "UPDATE actividades
                SET estado =
                    CASE
                        WHEN estado = 1 THEN 0
                        ELSE 1
                    END

                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }

        public function obtenerActivas()
{
    $sql = "SELECT
                actividades.*,
                destinos.nombre AS destino_nombre
            FROM actividades
            INNER JOIN destinos
                ON actividades.destino_id = destinos.id
            WHERE actividades.estado = 1
            AND destinos.estado = 1
            ORDER BY actividades.nombre ASC";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}