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
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f8f8;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .back-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>";

    // Start table HTML
    echo "<div class='container'>";
    echo "<h2>Registered Persons</h2>";
    echo "<table>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
          </tr>";
    
    // Fetch and display each record
