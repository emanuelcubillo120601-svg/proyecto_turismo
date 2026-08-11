<?php

require_once __DIR__ . "/../config/database.php";

class Destino
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

            $sql = "SELECT *
                    FROM destinos
                    WHERE nombre LIKE :buscar
                    OR provincia LIKE :buscar
                    ORDER BY id DESC";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute([
                ":buscar" => "%" . $buscar . "%"
            ]);

        } else {

            $sql = "SELECT *
                    FROM destinos
                    ORDER BY id DESC";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM destinos
                WHERE id = :id
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $nombre,
        $provincia,
        $descripcion,
        $imagen,
        $latitud,
        $longitud
    ) {
        $sql = "INSERT INTO destinos
                (
                    nombre,
                    provincia,
                    descripcion,
                    imagen,
                    latitud,
                    longitud
                )
                VALUES
                (
                    :nombre,
                    :provincia,
                    :descripcion,
                    :imagen,
                    :latitud,
                    :longitud
                )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":nombre" => $nombre,
            ":provincia" => $provincia,
            ":descripcion" => $descripcion,
            ":imagen" => $imagen,
            ":latitud" => $latitud,
            ":longitud" => $longitud
        ]);
    }

    public function actualizar(
        $id,
        $nombre,
        $provincia,
        $descripcion,
        $imagen,
        $latitud,
        $longitud
    ) {
        $sql = "UPDATE destinos
                SET
                    nombre = :nombre,
                    provincia = :provincia,
                    descripcion = :descripcion,
                    imagen = :imagen,
                    latitud = :latitud,
                    longitud = :longitud
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":id" => $id,
            ":nombre" => $nombre,
            ":provincia" => $provincia,
            ":descripcion" => $descripcion,
            ":imagen" => $imagen,
            ":latitud" => $latitud,
            ":longitud" => $longitud
        ]);
    }

    public function cambiarEstado($id)
    {
        $sql = "UPDATE destinos
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
}