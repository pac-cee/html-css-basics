<?php
// Database connection configuration
$host = "localhost";  // Your database host
$username = "root";   // Your database username
$password = "";       // Your database password
$database = "pension_system"; // Your actual database name

// Initialize variables
$employName = "";
$employeeAddress = "";
$monthlySalary = 0;
$employeePeriod = 0;
$benefitPercentage = 0;
$totalAmount = 0;
$amountPerMonth = 0;
$message = "";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    $message = "Database connection failed: " . $conn->connect_error;
}

// Process form submission
if(isset($_POST['calculate'])) {
    // Get form data
    $employName = $_POST['employ_name'];
    $employeeAddress = $_POST['employee_address'];
    $monthlySalary = floatval($_POST['monthly_salary']);
    $employeePeriod = intval($_POST['employee_period']);
    $benefitPercentage = floatval($_POST['benefit_percentage']);
    
    // Validate inputs
    if(empty($employName) || empty($employeeAddress) || $monthlySalary <= 0 || $employeePeriod <= 0 || $benefitPercentage <= 0) {
        $message = "Please fill all fields with valid values";
    } else {
        // Calculate pension amounts
        $totalAmount = $monthlySalary * $employeePeriod * ($benefitPercentage / 100);
        $amountPerMonth = $totalAmount / ($employeePeriod * 12); // Monthly payment after retirement
    }
}

// Handle data submission to database
if(isset($_POST['submit'])) {
    // Get form data
    $employName = $_POST['employ_name'];
    $employeeAddress = $_POST['employee_address'];
    $monthlySalary = floatval($_POST['monthly_salary']);
    $employeePeriod = intval($_POST['employee_period']);
    $benefitPercentage = floatval($_POST['benefit_percentage']);
    
    // Recalculate to ensure correct values
    $totalAmount = $monthlySalary * $employeePeriod * ($benefitPercentage / 100);
    $amountPerMonth = $totalAmount / ($employeePeriod * 12);
    
    // Validate inputs before submission
    if(empty($employName) || empty($employeeAddress) || $monthlySalary <= 0 || $employeePeriod <= 0 || $benefitPercentage <= 0) {
        $message = "Please fill all fields with valid values before submitting";
    } else {
        // Prepare SQL statement with prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO pension_records (employ_name, employee_address, monthly_salary, employee_period, benefit_percentage, total_amount, amount_per_month) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiddd", $employName, $employeeAddress, $monthlySalary, $employeePeriod, $benefitPercentage, $totalAmount, $amountPerMonth);
        
        // Execute the statement
        if($stmt->execute()) {
            $message = "Record saved successfully!";
            // Clear form after successful submission
            $employName = "";
            $employeeAddress = "";
            $monthlySalary = 0;
            $employeePeriod = 0;
            $benefitPercentage = 0;
            $totalAmount = 0;
            $amountPerMonth = 0;
        } else {
            $message = "Error saving record: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}

// Handle data retrieval
if(isset($_POST['retrieve'])) {
    $searchName = isset($_POST['employ_name']) ? $_POST['employ_name'] : '';
    
    if(empty($searchName)) {
        $message = "Please enter an employee name to retrieve records";
    } else {
        // Prepare SQL statement for retrieval
        $stmt = $conn->prepare("SELECT * FROM pension_records WHERE employ_name LIKE ?");
        $searchParam = "%" . $searchName . "%";
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            // Fetch the first matching record
            $row = $result->fetch_assoc();
            
            // Populate form with retrieved data
            $employName = $row['employ_name'];
            $employeeAddress = $row['employee_address'];
            $monthlySalary = $row['monthly_salary'];
            $employeePeriod = $row['employee_period'];
            $benefitPercentage = $row['benefit_percentage'];
            $totalAmount = $row['total_amount'];
            $amountPerMonth = $row['amount_per_month'];
            
            $message = "Record retrieved successfully!";
        } else {
            $message = "No records found for: " . $searchName;
        }
        
        $stmt->close();
    }
}

// Handle data deletion
if(isset($_POST['delete'])) {
    $searchName = isset($_POST['employ_name']) ? $_POST['employ_name'] : '';
    
    if(empty($searchName)) {
        $message = "Please enter an employee name to delete records";
    } else {
        // Prepare SQL statement for deletion
        $stmt = $conn->prepare("DELETE FROM pension_records WHERE employ_name = ?");
        $stmt->bind_param("s", $searchName);
        
        // Execute the statement
        if($stmt->execute()) {
            if($stmt->affected_rows > 0) {
                $message = "Record deleted successfully!";
                // Clear form after successful deletion
                $employName = "";
                $employeeAddress = "";
                $monthlySalary = 0;
                $employeePeriod = 0;
                $benefitPercentage = 0;
                $totalAmount = 0;
                $amountPerMonth = 0;
            } else {
                $message = "No record found for deletion with name: " . $searchName;
            }
        } else {
            $message = "Error deleting record: " . $conn->error;
        }
        
        $stmt->close();
    }
}
?>
// Don't close the connection here - close it at the end of the script

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICDL - Employer Pension Management System</title>
    <link rel="stylesheet" href="icdl.sql">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
