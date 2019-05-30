<?php
/**
 * PHP BASICS DEMO
 * - Syntax fundamentals
 * - Variable handling
 * - Basic operations
 */

// Strict error reporting
declare(strict_types=1);

// 1. Variables and Output
$message = "Hello, PHP Basics!";
echo "<h1>$message</h1>";

// 2. Conditional Logic
$temperature = 22;
if ($temperature > 25) {
    echo "<p>It's warm!</p>";
