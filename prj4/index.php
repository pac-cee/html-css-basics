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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pension Management System</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="head">
        <header class="header">
            <div>
                <img src="icdl-logo.svg" class="logo img" alt="ICDL Logo">
            </div>
            <div class="left">
                <div id="mobile-language-select" class="drop">
                    <select class="dropdwon">
                        <option>English</option>
                    </select>
                </div>
                <div class="nav-img">
                    <img src="search-circle-white.svg" class="nav-img1 img" alt="Search">
                    <img src="connect-circle-white.svg" class="nav-img2 img" alt="Connect">
                </div>
            </div>
        </header>
       
    </div>
    <div class="nav">
            <nav>
                <a href="">ABOUT US</a>
                <a href="">PROGRAMMES</a>
                <a href="">INDIVIDUALS</a>
                <a href="">SCHOOLS</a>
                <a href="">UNIVERSTIES</a>
                <a href="">TRAINING PROVIDERS</a>
                <a href="">EMPLOYERS</a>
                <a href="">PARTNERSHIPS</a>
                <a href="">TEST CENTERS</a>
            </nav>
        </div>
    <main>
        <div>
            <img src="icdl.jpg" id="main-img" alt="ICDL Main" >
        </div>
        <div class="middle">
            <div class="form">
                <h3>EMPLOYER PENSION MANAGEMENT SYSTEM</h3>
                
                <?php if(!empty($message)): ?>
                    <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="">
                    <pre>           
      EMPLOY NAME: <input type="text" name="employ_name" value="<?php echo htmlspecialchars($employName); ?>" required>
