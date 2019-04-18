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
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new FormValidator();
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    
    if ($validator->validateName($name)) {
        try {
            // Insert into database
            $stmt = $pdo->prepare("INSERT INTO users (name, created_at) VALUES (?, NOW())");
            $stmt->execute([$name]);
            
            // Store in session
            $_SESSION['user_name'] = $name;
            $_SESSION['success_message'] = "Welcome, $name!";
            
        } catch(PDOException $e) {
            $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error_message'] = implode(", ", $validator->getErrors());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced PHP Demo</title>
    <style>
        .error { color: red; }
        .success { color: green; }
        .form-container { margin: 20px; padding: 20px; }
    </style>
