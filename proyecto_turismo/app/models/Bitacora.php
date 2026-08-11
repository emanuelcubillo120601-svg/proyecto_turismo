<?php

require_once __DIR__ . "/../config/database.php";

class Bitacora
{
    private $conexion;

    public function __construct()
    {
        $database =
            new Database();

        $this->conexion =
            $database->conectar();
    }

    public function registrar(
        $usuarioId,
        $accion
    ) {
        $sql = "INSERT INTO bitacora
                (
                    usuario_id,
                    accion
                )
                VALUES
                (
                    :usuario_id,
                    :accion
                )";

        $stmt =
            $this->conexion->prepare($sql);

        return $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":accion" => $accion
        ]);
    }


    public function obtenerTodas()
    {
        $sql = "SELECT
                    bitacora.id,
                    bitacora.accion,
                    bitacora.fecha_registro,
                    usuarios.nombre AS usuario_nombre

                FROM bitacora

                LEFT JOIN usuarios
                    ON bitacora.usuario_id =
                       usuarios.id

                ORDER BY bitacora.id DESC";

        $stmt =
            $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }
}