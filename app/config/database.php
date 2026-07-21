<?php

class Database
{
    private string $host = "localhost";
    private string $db_name = "turismo_cr";
    private string $username = "root";
    private string $password = "";

    public function conectar(): ?PDO
    {
        $conexion = null;

        try {

            $conexion = new PDO(
                "mysql:host=" . $this->host .
                ";dbname=" . $this->db_name .
                ";charset=utf8mb4",
                $this->username,
                $this->password
            );

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

        } catch (PDOException $e) {

            echo "Error al conectar con la base de datos.";

        }

        return $conexion;
    }
}