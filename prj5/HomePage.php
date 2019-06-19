<?php
// Start the session
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | Account Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc, #cfdef3);
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 420px;
            margin: 60px auto 0 auto;
            padding: 36px 32px 28px 32px;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(0,0,0,0.10);
            text-align: center;
        }
        h1 {
            color: #3b82f6;
            font-size: 2.2rem;
            margin-bottom: 8px;
