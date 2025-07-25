<?php

class Database
{
    private $host = 'localhost';
    private $port = '3306';
    private $dbname = 'medical_appointments';
    private $username = 'root';
    private $password = 'rootpassword';
    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host}:{$this->port};dbname={$this->dbname};charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    // Método para crear la tabla si no existe
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS appointments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            patient_name VARCHAR(255) NOT NULL,
            specialty ENUM('Medicina General', 'Pediatría', 'Dermatología') NOT NULL,
            appointment_date DATE NOT NULL,
            registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_appointment_date (appointment_date),
            INDEX idx_specialty (specialty)
        )";

        try {
            $this->pdo->exec($sql);
        } catch (PDOException $e) {
            die("Error al crear la tabla: " . $e->getMessage());
        }
    }
}
