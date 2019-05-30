<?php
/**
 * MYSQL DATABASE CONNECTION
 * - Uses PDO for secure connections
 * - Prepared statements
 */

class MySQLConnection {
    private PDO $pdo;

    public function __construct() {
        $host = 'localhost';
        $db   = 'mydb';
        $user = 'root';
        $pass = 'secure_password';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
