<?php
require_once __DIR__ . '/../controllers/auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'attendee';
    $msg = '';
    if ($name && $email && $password && in_array($role, [ROLE_ORGANIZER, ROLE_ATTENDEE])) {
        $db = new Database();
        $conn = $db->getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hash, $role);
        if ($stmt->execute()) {
            $msg = "<span style='color:green'><i class='fas fa-check-circle'></i> Registration successful! Please <a href='../views/login.php'>login</a>.</span>";
        } else {
            $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Registration failed: " . htmlspecialchars($stmt->error) . "</span>";
        }
