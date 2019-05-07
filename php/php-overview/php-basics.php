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
