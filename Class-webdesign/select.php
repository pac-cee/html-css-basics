<?php
require_once 'connection1.php';

try {
    // Prepare and execute SELECT query using mysqli
    $result = mysqli_query($con, "SELECT FirstName, LastName, Age FROM Persons ORDER BY FirstName");
    
    if (!$result) {
        throw new Exception(mysqli_error($con));
    }

    // Add CSS for table styling
    echo "
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
