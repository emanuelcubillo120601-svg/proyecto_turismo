<?php

require_once __DIR__ . "/../config/database.php";

class Favorito
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();

        $this->conexion = $database->conectar();
    }


    public function alternar($usuarioId, $destinoId)
    {
        $sql = "SELECT id
                FROM favoritos
                WHERE usuario_id = :usuario_id
                AND destino_id = :destino_id
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":destino_id" => $destinoId
        ]);

        $favorito = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($favorito) {

            $sql = "DELETE FROM favoritos
                    WHERE id = :id";

            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([
                ":id" => $favorito["id"]
            ]);
        }


        $sql = "INSERT INTO favoritos
                (
                    usuario_id,
                    destino_id
                )
                VALUES
                (
                    :usuario_id,
                    :destino_id
                )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":destino_id" => $destinoId
        ]);
    }


    public function obtenerPorUsuario($usuarioId)
    {
        $sql = "SELECT
                    destinos.id,
                    destinos.nombre,
                    destinos.provincia,
                    destinos.descripcion,
                    destinos.imagen,
                    destinos.latitud,
                    destinos.longitud,
                    destinos.estado,
                    favoritos.fecha_registro

                FROM favoritos

                INNER JOIN destinos
                    ON favoritos.destino_id = destinos.id

                WHERE favoritos.usuario_id = :usuario_id

                ORDER BY favoritos.fecha_registro DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":usuario_id" => $usuarioId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function esFavorito($usuarioId, $destinoId)
    {
        $sql = "SELECT id
                FROM favoritos
                WHERE usuario_id = :usuario_id
                AND destino_id = :destino_id
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":destino_id" => $destinoId
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}