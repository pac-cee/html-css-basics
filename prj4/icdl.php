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
