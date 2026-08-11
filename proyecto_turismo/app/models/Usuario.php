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

public function obtenerPorId($id)
{
    $sql = "SELECT
                id,
                rol_id,
                nombre,
                correo,
                telefono,
                fotografia,
                estado,
                fecha_registro
            FROM usuarios
            WHERE id = :id
            LIMIT 1";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute([
        ":id" => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function actualizarPerfil(
    $id,
    $nombre,
    $correo,
    $telefono
) {
    $sql = "UPDATE usuarios
            SET
                nombre = :nombre,
                correo = :correo,
                telefono = :telefono
            WHERE id = :id";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        ":id" => $id,
        ":nombre" => $nombre,
        ":correo" => $correo,
        ":telefono" => $telefono
    ]);
}


public function actualizarPassword($id, $password)
{
    $sql = "UPDATE usuarios
            SET password = :password
            WHERE id = :id";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        ":id" => $id,
        ":password" => $password
    ]);
}


public function obtenerTodos()
{
    $sql = "SELECT
                usuarios.id,
                usuarios.nombre,
                usuarios.correo,
                usuarios.telefono,
                usuarios.estado,
                usuarios.fecha_registro,
                roles.nombre AS rol
            FROM usuarios

            INNER JOIN roles
                ON usuarios.rol_id = roles.id

            ORDER BY usuarios.id DESC";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function cambiarEstado($id)
{
    $sql = "UPDATE usuarios
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

public function crearTokenRecuperacion(
    $usuarioId,
    $tokenHash,
    $fechaExpiracion
) {
    $sql = "INSERT INTO recuperacion_password
            (
                usuario_id,
                token_hash,
                fecha_expiracion
            )
            VALUES
            (
                :usuario_id,
                :token_hash,
                :fecha_expiracion
            )";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        ":usuario_id" => $usuarioId,
        ":token_hash" => $tokenHash,
        ":fecha_expiracion" => $fechaExpiracion
    ]);
}


public function buscarTokenValido($tokenHash)
{
    $sql = "SELECT
                recuperacion_password.id,
                recuperacion_password.usuario_id
            FROM recuperacion_password

            WHERE token_hash = :token_hash
            AND usado = 0
            AND fecha_expiracion >= NOW()

            LIMIT 1";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute([
        ":token_hash" => $tokenHash
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function marcarTokenUsado($id)
{
    $sql = "UPDATE recuperacion_password
            SET usado = 1
            WHERE id = :id";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        ":id" => $id
    ]);
}
}
