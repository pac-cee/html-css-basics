<?php
require_once __DIR__ . '/../controllers/auth.php';
require_role(ROLE_ORGANIZER);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard - Eventify</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.7/quill.snow.css">
</head>
<body>
<header class="dashboard-header" style="background:rgba(255,255,255,0.18);backdrop-filter:blur(12px) saturate(180%);border-radius:18px 18px 0 0;box-shadow:0 8px 32px #4f8cff22;padding:2em 2em 1em 2em;margin-bottom:1.5em;animation:fadeInDown 0.7s cubic-bezier(.65,.05,.36,1);">
    <h1 style="color:var(--primary,#4f8cff);font-size:2.3em;margin-bottom:0.3em;">Organizer Dashboard</h1>
    <p style="color:#232946b3;font-size:1.07em;">Welcome, <span style="font-weight:600;">Organizer</span>. Create and manage your events below.</p>
