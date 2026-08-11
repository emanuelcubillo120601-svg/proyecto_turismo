<?php

require_once __DIR__ . "/../config/database.php";

class Comentario
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();

        $this->conexion = $database->conectar();
    }

    public function crear(
        $usuarioId,
        $destinoId,
        $comentario,
        $calificacion
    ) {
        $sql = "INSERT INTO comentarios
                (
                    usuario_id,
                    destino_id,
                    comentario,
                    calificacion
                )
                VALUES
                (
                    :usuario_id,
                    :destino_id,
                    :comentario,
                    :calificacion
                )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":destino_id" => $destinoId,
            ":comentario" => $comentario,
            ":calificacion" => $calificacion
        ]);
    }


    public function obtenerPorDestino($destinoId)
    {
        $sql = "SELECT
                    comentarios.id,
                    comentarios.comentario,
                    comentarios.calificacion,
                    comentarios.fecha_registro,
                    usuarios.nombre AS usuario_nombre

                FROM comentarios

                INNER JOIN usuarios
                    ON comentarios.usuario_id = usuarios.id

                WHERE comentarios.destino_id = :destino_id

                ORDER BY comentarios.id DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":destino_id" => $destinoId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function promedioPorDestino($destinoId)
    {
        $sql = "SELECT
                    COALESCE(
                        AVG(calificacion),
                        0
                    ) AS promedio

                FROM comentarios

                WHERE destino_id = :destino_id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ":destino_id" => $destinoId
        ]);

        $resultado =
            $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado["promedio"];
    }
}