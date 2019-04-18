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
