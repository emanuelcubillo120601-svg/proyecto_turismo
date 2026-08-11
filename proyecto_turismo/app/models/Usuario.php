<?php

class Usuario
{
    private PDO $conexion;

    public function __construct(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    public function registrar(
        string $nombre,
        string $correo,
        string $telefono,
        string $password
    ): bool {

        $sql = "INSERT INTO usuarios
                (rol_id, nombre, correo, telefono, password)
                VALUES
                (:rol_id, :nombre, :correo, :telefono, :password)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ":rol_id" => 2,
            ":nombre" => $nombre,
            ":correo" => $correo,
            ":telefono" => $telefono,
            ":password" => $password
        ]);
    }
    public function existeCorreo(string $correo): bool
{
    $sql = "SELECT id
            FROM usuarios
            WHERE correo = :correo
            LIMIT 1";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute([
        ":correo" => $correo
    ]);

    return $stmt->fetch() !== false;
}
public function buscarPorCorreo(string $correo)
{
    $sql = "SELECT
                usuarios.id,
                usuarios.nombre,
                usuarios.correo,
                usuarios.password,
                usuarios.rol_id,
                usuarios.estado,
                roles.nombre AS rol
            FROM usuarios

            INNER JOIN roles
                ON usuarios.rol_id = roles.id

            WHERE usuarios.correo = :correo

            LIMIT 1";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute([
        ":correo" => $correo
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
