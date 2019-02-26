<?php
$con = mysqli_connect("127.0.0.1", "root", "", "webdesign");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Only process if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age'])) {
        // Validate and sanitize inputs
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);

        // Validate age
