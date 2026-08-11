<?php

require_once __DIR__ . "/../config/database.php";

class Hotel
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

            $sql = "SELECT hoteles.*, destinos.nombre AS destino_nombre
                    FROM hoteles
                    INNER JOIN destinos
                        ON hoteles.destino_id = destinos.id
                    WHERE hoteles.nombre LIKE :buscar
                    OR destinos.nombre LIKE :buscar
                    ORDER BY hoteles.id DESC";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute([
                ":buscar" => "%" . $buscar . "%"
            ]);

        } else {

            $sql = "SELECT hoteles.*, destinos.nombre AS destino_nombre
                    FROM hoteles
                    INNER JOIN destinos
                        ON hoteles.destino_id = destinos.id
                    ORDER BY hoteles.id DESC";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM hoteles
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
        $categoria,
        $direccion,
        $telefono,
        $correo,
        $precio_noche,
        $cantidad_habitaciones,
        $descripcion,
        $imagen
    ) {
        $sql = "INSERT INTO hoteles
                (
                    destino_id,
                    nombre,
                    categoria,
                    direccion,
                    telefono,
                    correo,
                    precio_noche,
                    cantidad_habitaciones,
                    descripcion,
                    imagen
                )
                VALUES
                (
                    :destino_id,
                    :nombre,
                    :categoria,
                    :direccion,
                    :telefono,
                    :correo,
                    :precio_noche,
                    :cantidad_habitaciones,
                    :descripcion,
                    :imagen
                )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":destino_id" => $destino_id,
            ":nombre" => $nombre,
            ":categoria" => $categoria,
            ":direccion" => $direccion,
            ":telefono" => $telefono,
            ":correo" => $correo,
            ":precio_noche" => $precio_noche,
            ":cantidad_habitaciones" => $cantidad_habitaciones,
            ":descripcion" => $descripcion,
            ":imagen" => $imagen
        ]);
    }

    public function actualizar(
        $id,
        $destino_id,
        $nombre,
        $categoria,
        $direccion,
        $telefono,
        $correo,
        $precio_noche,
        $cantidad_habitaciones,
        $descripcion,
        $imagen
    ) {
        $sql = "UPDATE hoteles
                SET
                    destino_id = :destino_id,
                    nombre = :nombre,
                    categoria = :categoria,
                    direccion = :direccion,
                    telefono = :telefono,
                    correo = :correo,
                    precio_noche = :precio_noche,
                    cantidad_habitaciones = :cantidad_habitaciones,
                    descripcion = :descripcion,
                    imagen = :imagen
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":id" => $id,
            ":destino_id" => $destino_id,
            ":nombre" => $nombre,
            ":categoria" => $categoria,
            ":direccion" => $direccion,
            ":telefono" => $telefono,
            ":correo" => $correo,
            ":precio_noche" => $precio_noche,
            ":cantidad_habitaciones" => $cantidad_habitaciones,
            ":descripcion" => $descripcion,
            ":imagen" => $imagen
        ]);
    }

    public function cambiarEstado($id)
    {
        $sql = "UPDATE hoteles
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