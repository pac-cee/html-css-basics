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
        $stmt->close();
    } else {
        $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Please fill all fields correctly.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Eventify</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
body {
