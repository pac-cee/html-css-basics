<?php
require_once __DIR__ . '/../controllers/auth.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($email && $password) {
        if (login($email, $password)) {
            $role = get_user_role();
            if ($role === ROLE_ADMIN) {
                header('Location: ../controllers/dashboard_admin.php');
            } elseif ($role === ROLE_ORGANIZER) {
                header('Location: ../controllers/dashboard_organizer.php');
            } else {
                header('Location: ../controllers/dashboard_attendee.php');
            }
            exit();
        } else {
            $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Invalid credentials.</span>";
