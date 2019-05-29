<?php
/**
 * DATABASE CONFIGURATION
 * - Centralized database settings
 * - Environment-aware configuration
 */

return [
    'mysql' => [
        'host' => getenv('DB_MYSQL_HOST') ?: 'localhost',
        'port' => getenv('DB_MYSQL_PORT') ?: 3306,
        'database' => getenv('DB_MYSQL_NAME') ?: 'mydb',
        'username' => getenv('DB_MYSQL_USER') ?: 'root',
        'password' => getenv('DB_MYSQL_PASS') ?: 'secure_password',
        'charset' => 'utf8mb4',
        'options' => [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]
