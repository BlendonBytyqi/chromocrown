<?php

class Database {
    private string $host = "localhost";
    private string $db   = "chromocrown";
    private string $user = "root";
    private string $pass = "";

    private ?PDO $conn = null;

    public function connect(): PDO {
        if ($this->conn instanceof PDO) return $this->conn;

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
            return $this->conn;
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }
}
