<?php
/**
 * PHP INTERMEDIATE
 * This file covers intermediate PHP concepts
 * 
 * Topics covered:
 * - Working with strings
 * - Date and time handling
 * - Error handling
 * - File system operations
 * - Sessions and cookies
 * - Regular expressions
 * - Object-oriented programming basics
 * - Namespaces
 * - JSON and XML handling
 */

// ====================================
// WORKING WITH STRINGS
// ====================================

// String functions
$message = "Hello, World!";
echo strlen($message); // Length: 13
echo strtolower($message); // hello, world!
echo strtoupper($message); // HELLO, WORLD!
echo ucfirst("hello"); // Hello
echo ucwords("hello world"); // Hello World
echo strpos($message, "World"); // Position: 7 (zero-indexed)
echo substr($message, 0, 5); // Hello
echo str_replace("World", "PHP", $message); // Hello, PHP!
echo trim(" Hello "); // Removes whitespace from start and end

// String interpolation
$name = "John";
echo "Hello, $name!"; // Variables inside double quotes are parsed
echo 'Hello, $name!'; // Variables inside single quotes are not parsed
echo "Array element: {$array['key']}"; // Complex expressions need curly braces

// Heredoc (variables are parsed)
$text = <<<EOT
This is a multi-line string
using heredoc syntax.
Hello, $name!
EOT;

// Nowdoc (variables are not parsed, PHP 5.3+)
$text = <<<'EOT'
This is a multi-line string
using nowdoc syntax.
Hello, $name! (not parsed)
EOT;

// String comparison
$a = "hello";
$b = "hello";
var_dump($a == $b); // Equality check
