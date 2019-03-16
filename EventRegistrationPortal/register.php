<?php
require_once __DIR__ . '/config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $db = new Database();
    $conn = $db->getConnection();
    $stmt = $conn->prepare("INSERT INTO registrations (event_id, name, email) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $event_id, $name, $email);
    if ($stmt->execute()) {
        $msg = "Registration successful!";
    } else {
        $msg = "Error: " . $stmt->error;
    }
    $stmt->close();
}
$db = new Database();
$conn = $db->getConnection();
