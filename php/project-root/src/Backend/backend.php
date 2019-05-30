<?php
/**
 * BACKEND ARCHITECTURE
 * - REST API example
 * - JWT Authentication
 * - Route handling
 */

header("Content-Type: application/json");

// Simple router
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/api/users':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode(['users' => [/* Data from DB */]]);
        }
        break;
