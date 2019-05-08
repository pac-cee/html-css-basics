<?php
/**
 * PHP BASICS
 * This file covers fundamental PHP concepts for beginners
 * 
 * Topics covered:
 * - Syntax and basic structure
 * - Variables and data types
 * - Operators
 * - Control structures
 * - Functions
 * - Arrays
 * - Form handling
 */

// ====================================
// SYNTAX AND BASIC STRUCTURE
// ====================================

// PHP code is enclosed in <?php ?> tags
// Statements end with semicolons

// Output methods
echo "Hello World!"; // Outputs strings or numbers
print("Hello World!"); // Similar to echo but returns 1
var_dump("Hello"); // Outputs type and value (useful for debugging)

// Comments
// Single line comment
# Alternative single line comment
/*
   Multi-line
   comment
*/

// ====================================
// VARIABLES AND DATA TYPES
// ====================================

// Variables start with $ followed by name
$name = "John"; // String
$age = 25; // Integer
$height = 6.2; // Float
$isActive = true; // Boolean
$user = null; // Null

// Variable naming conventions
$firstName; // camelCase (recommended)
$first_name; // snake_case
$FirstName; // PascalCase

// Constants
define("PI", 3.14159);
const DATABASE_NAME = "my_app"; // Alternative constant definition

// Data type checking
echo gettype($name); // Returns the type as string
var_dump($name); // Outputs type and value
is_string($name); // Type-specific check, returns boolean

// Type casting
$numString = "42";
$num = (int)$numString; // Cast to integer
$stringNum = (string)$num; // Cast to string

// ====================================
// OPERATORS
// ====================================

// Arithmetic operators
$a = 10;
$b = 3;
echo $a + $b; // Addition: 13
echo $a - $b; // Subtraction: 7
echo $a * $b; // Multiplication: 30
echo $a / $b; // Division: 3.33...
echo $a % $b; // Modulus (remainder): 1
echo $a ** $b; // Exponentiation: 1000

// Assignment operators
$c = 5; // Basic assignment
$c += 3; // $c = $c + 3; (value becomes 8)
$c -= 2; // $c = $c - 2; (value becomes 6)
$c *= 2; // $c = $c * 2; (value becomes 12)
$c /= 4; // $c = $c / 4; (value becomes 3)
$c %= 2; // $c = $c % 2; (value becomes 1)

// Comparison operators
$a == $b; // Equal (value)
$a === $b; // Identical (value and type)
$a != $b; // Not equal
$a !== $b; // Not identical
$a > $b; // Greater than
$a >= $b; // Greater than or equal to
$a < $b; // Less than
$a <= $b; // Less than or equal to
$a <=> $b; // Spaceship operator (returns -1, 0, or 1)

// Logical operators
$x && $y; // Logical AND
$x || $y; // Logical OR
!$x; // Logical NOT
$x and $y; // Alternative AND (lower precedence)
$x or $y; // Alternative OR (lower precedence)
$x xor $y; // Exclusive OR

// String operators
$greeting = "Hello";
$fullGreeting = $greeting . " World!"; // Concatenation
$greeting .= " World!"; // Concatenation assignment

// ====================================
// CONTROL STRUCTURES
// ====================================

// If-else statements
$score = 85;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: D";
}

// Switch statement
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of work week";
        break;
    case "Friday":
        echo "End of work week";
        break;
    case "Saturday":
    case "Sunday":
        echo "Weekend";
        break;
    default:
        echo "Regular work day";
}

// Ternary operator
$age = 20;
$status = ($age >= 18) ? "Adult" : "Minor";

// Null coalescing operator (PHP 7+)
$username = $_GET['username'] ?? "Guest";

// Loops
// For loop
for ($i = 1; $i <= 5; $i++) {
    echo "Iteration: $i<br>";
}

// While loop
$counter = 1;
while ($counter <= 5) {
    echo "Counter: $counter<br>";
    $counter++;
}

// Do-while loop
$num = 1;
do {
    echo "Number: $num<br>";
    $num++;
} while ($num <= 5);

// Foreach loop (for arrays)
$colors = ["red", "green", "blue"];
foreach ($colors as $color) {
    echo "Color: $color<br>";
}

// Foreach with key => value
$person = [
    "name" => "John",
    "age" => 30,
    "job" => "Developer"
];
foreach ($person as $key => $value) {
    echo "$key: $value<br>";
}

// Loop control
