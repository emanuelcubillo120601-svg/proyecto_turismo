<?php

class Database
{
    private $host = "localhost";
    private $db_name = "turismo_cr";
    private $username = "root";
    private $password = "";

    public function conectar()
    {
        try {

            $conexion = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conexion;

        } catch (PDOException $e) {

            die("Error de conexión: " . $e->getMessage());

        }
    }
}