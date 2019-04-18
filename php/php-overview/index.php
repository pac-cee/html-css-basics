<?php
session_start();

// Database connection
include("connection.php");
/*$db_config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'users_db'
];

try {
    $pdo = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['database']}",
        $db_config['username'],
        $db_config['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
} */

// Form validation class
class FormValidator {
    private $errors = [];
    
    public function validateName($name) {
        if (empty($name)) {
            $this->errors[] = "Name is required";
        } elseif (strlen($name) < 2) {
            $this->errors[] = "Name must be at least 2 characters";
        }
        return empty($this->errors);
    }
    
    public function getErrors() {
        return $this->errors;
