<?php
/**
 * JSON AND XML HANDLING
 * This file covers handling JSON and XML data formats in PHP
 */

// ====================================
// JSON HANDLING
// ====================================

// Encoding PHP arrays/objects to JSON
$data = [
    "name" => "John Doe",
    "age" => 30,
    "email" => "john@example.com",
    "active" => true,
    "skills" => ["PHP", "JavaScript", "MySQL"]
];

$jsonString = json_encode($data);
echo $jsonString;

// Pretty-print JSON (with indentation)
$jsonPretty = json_encode($data, JSON_PRETTY_PRINT);
echo $jsonPretty;

// JSON encoding options
$jsonOptions = json_encode($data, JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_UNESCAPED_SLASHES);
// JSON_HEX_TAG - Convert < and > to \u003C and \u003E
// JSON_HEX_AMP - Convert & to \u0026
// JSON_HEX_APOS - Convert ' to \u0027
// JSON_HEX_QUOT - Convert " to \u0022
// JSON_UNESCAPED_SLASHES - Don't escape /
// JSON_UNESCAPED_UNICODE - Don't escape Unicode characters
// JSON_NUMERIC_CHECK - Convert numeric strings to numbers
// JSON_FORCE_OBJECT - Force {} notation instead of [] for empty arrays

// Decoding JSON to PHP
