<?php
/**
 * POSTGRESQL DATABASE CONNECTION
 * - PDO with PostgreSQL specific DSN
 */

class PostgresConnection {
    private PDO $pdo;

    public function __construct() {
        $dsn = "pgsql:host=localhost;port=5432;dbname=mydb;user=postgres;password=postgres-pw";
        
        try {
            $this->pdo = new PDO($dsn);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("PostgreSQL Connection Failed: " . $e->getMessage());
        }
    }
