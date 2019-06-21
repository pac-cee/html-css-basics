<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php';

// Debug: Check if database connection is successful
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Validate the input
    // Enhanced validation
    if(empty($first_name) || empty($last_name) || empty($address) || empty($telephone) || empty($username) || empty($password)) {
        echo "<p style='color:red;'>All fields are required.</p>";
    } elseif(!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
        echo "<p style='color:red;'>First Name: Only letters, hyphens, apostrophes, and spaces allowed.</p>";
    } elseif(!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
        echo "<p style='color:red;'>Last Name: Only letters, hyphens, apostrophes, and spaces allowed.</p>";
    } elseif(!preg_match("/^[0-9]{7,15}$/", $telephone)) {
        echo "<p style='color:red;'>telephone: Only numbers allowed (7-15 digits).</p>";
    } elseif(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Username must be a valid email address.</p>";
    } elseif(strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[^a-zA-Z0-9]/", $password)) {
        echo "<p style='color:red;'>Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.</p>";
    } else {
        // First check if username already exists
        $check_username = "SELECT * FROM Credentials WHERE username = ?";
        $check_stmt = mysqli_stmt_init($conn);
        
        if(!$check_stmt) {
            echo "<p style='color:red;'>Failed to initialize statement: " . mysqli_error($conn) . "</p>";
        } else {
            mysqli_stmt_prepare($check_stmt, $check_username);
            mysqli_stmt_bind_param($check_stmt, "s", $username);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);
            
            if(mysqli_stmt_num_rows($check_stmt) > 0) {
                echo "<div class='alert alert-danger' style='color:red; font-weight:bold; padding:10px; background-color:#f8d7da; border:1px solid red;'>Username already exists. Please choose a different username.</div>";
            } else {
                // Now attempt to insert the data
                $sql = "INSERT INTO Credentials (first_name, last_name, address, telephone, username, password) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                
                if(!$stmt) {
                    echo "<p style='color:red;'>Failed to initialize statement: " . mysqli_error($conn) . "</p>";
                } else {
                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    
                    if($preparestmt) {
                        mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $address, $telephone, $username, $hash_password);
                        
                        if(mysqli_stmt_execute($stmt)) {
                            echo "<div class='alert alert-success' style='color:green; font-weight:bold; padding:15px; background-color:#e7f3e7; border:1px solid green; margin:20px auto; text-align:center; max-width:400px; border-radius:5px;'>
                                    Successfully registered! You are good to go.
                                  </div>";
                        } else {
                            echo "<p style='color:red;'>Registration failed: " . mysqli_stmt_error($stmt) . "</p>";
                        }
                        
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<p style='color:red;'>Prepare failed: " . mysqli_error($conn) . "</p>";
                    }
                }
            }
            
            mysqli_stmt_close($check_stmt);
        }
