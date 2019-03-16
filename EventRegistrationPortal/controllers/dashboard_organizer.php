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
<div style="position:absolute;top:2em;right:2em;z-index:10;">
  <button id="theme-toggle-btn" title="Toggle theme" style="background:rgba(255,255,255,0.7);border:none;border-radius:50%;padding:0.6em 0.7em;box-shadow:0 2px 10px #4f8cff22;cursor:pointer;font-size:1.23em;outline:none;transition:background 0.18s;">
    <i class="fas fa-circle-half-stroke"></i>
  </button>
  <div id="theme-menu" style="display:none;position:absolute;right:0;top:2.7em;background:rgba(255,255,255,0.98);border-radius:12px;box-shadow:0 4px 24px #23294622;padding:0.6em 0.5em;min-width:140px;">
    <div class="theme-option" data-theme="light" style="padding:0.5em 1em;cursor:pointer;display:flex;align-items:center;"><i class="fas fa-sun" style="margin-right:0.7em;color:#fbbf24"></i> Light</div>
    <div class="theme-option" data-theme="dark" style="padding:0.5em 1em;cursor:pointer;display:flex;align-items:center;"><i class="fas fa-moon" style="margin-right:0.7em;color:#6366f1"></i> Dark</div>
    <div class="theme-option" data-theme="system" style="padding:0.5em 1em;cursor:pointer;display:flex;align-items:center;"><i class="fas fa-desktop" style="margin-right:0.7em;color:#38bdf8"></i> System</div>
  </div>
</div>
</header>
<nav aria-label="Organizer dashboard navigation">
    <a href="dashboard_organizer.php" class="active" aria-current="page"><i class="fas fa-calendar-alt"></i> <span class="visually-hidden">Current: </span>Dashboard</a>
    <a href="../views/create_event.php"><i class="fas fa-plus-circle"></i> Create Event</a>
    <a href="../views/manage_events.php"><i class="fas fa-edit"></i> Manage Events</a>
    <a href="../controllers/auth.php?logout=1"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>
<main>

