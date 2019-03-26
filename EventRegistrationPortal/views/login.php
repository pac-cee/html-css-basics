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
        }
    } else {
        $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Please fill all fields.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eventify</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
body {
  min-height: 100vh;
  background: linear-gradient(135deg, #e0e7ff 0%, #f4f8ff 100%);
  display: flex;
  align-items: center;
  justify-content: center;
}
.login-glass {
  max-width: 420px;
  margin: 3.5em auto;
  background: rgba(255,255,255,0.75);
  border-radius: 22px;
  box-shadow: 0 8px 40px #4f8cff22, 0 1.5px 8px #eebbc322;
  padding: 2.5em 2em 2em 2em;
  position: relative;
  backdrop-filter: blur(12px) saturate(160%);
  animation: fadeInUp 0.7s cubic-bezier(.65,.05,.36,1);
}
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(60px); }
