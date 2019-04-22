<?php
/**
 * PHP ADVANCED
 * This file covers advanced PHP concepts
 * 
 * Topics covered:
 * - Generators and iterators
 * - Closures and anonymous functions
 * - Reflection API
 * - Dependency injection
 * - Design patterns
 * - Working with streams
 * - Performance optimization
 * - Security best practices
 */

// ====================================
// GENERATORS AND ITERATORS
// ====================================

// Generators (PHP 5.5+)
// Memory-efficient way to iterate over large datasets
function getRange($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

foreach (getRange(1, 1000000) as $number) {
    echo $number . " ";
    if ($number > 10) break;
}

// Generator with key-value pairs
function getKeyValues() {
    yield 'key1' => 'value1';
    yield 'key2' => 'value2';
    yield 'key3' => 'value3';
}

foreach (getKeyValues() as $key => $value) {
    echo "$key: $value<br>";
}

// Yielding from another generator or traversable (PHP 7+)
function innerGenerator() {
    yield 1;
    yield 2;
}

function outerGenerator() {
    yield 0;
    yield from innerGenerator(); // Yields 1, 2
    yield 3;
}

// Generator delegation
