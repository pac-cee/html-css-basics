<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/models/PensionCalculator.php';
require_once __DIR__ . '/controllers/PensionController.php';

$controller = new PensionController();
$result = $controller->handleRequest();

// Initialize variables with default or submitted values
$employName = $_POST['employ_name'] ?? '';
$employeeAddress = $_POST['employee_address'] ?? '';
$monthlySalary = floatval($_POST['monthly_salary'] ?? 0);
$employeePeriod = intval($_POST['employee_period'] ?? 0);
$benefitPercentage = floatval($_POST['benefit_percentage'] ?? 0);
$totalAmount = $result['data']['totalAmount'] ?? 0;
$amountPerMonth = $result['data']['amountPerMonth'] ?? 0;
$message = $result['message'] ?? '';
?>
<!DOCTYPE html>
