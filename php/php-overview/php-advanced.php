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
function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4, 5];
    yield from new ArrayIterator([6, 7]);
    yield from eight_nine_ten();
}

function eight_nine_ten() {
    yield 8;
    yield 9;
    yield 10;
}

// Sending values to generators
function logger() {
    while (true) {
        $message = yield;
        echo date('Y-m-d H:i:s') . ": $message<br>";
    }
}

$logger = logger();
$logger->send('Log entry 1');
$logger->send('Log entry 2');

// Returning values from generators (PHP 7+)
function getValues() {
    yield 'a' => 1;
    yield 'b' => 2;
    
    return "Generator finished";
}

$generator = getValues();
foreach ($generator as $key => $value) {
    echo "$key: $value<br>";
}
echo $generator->getReturn(); // "Generator finished"

// Custom iterators
class MyIterator implements Iterator {
    private $position = 0;
    private $array = ['first', 'second', 'third'];
    
    public function rewind() {
        $this->position = 0;
    }
    
    public function current() {
        return $this->array[$this->position];
    }
    
    public function key() {
        return $this->position;
    }
    
    public function next() {
        ++$this->position;
    }
    
    public function valid() {
        return isset($this->array[$this->position]);
    }
}

$iterator = new MyIterator();
foreach ($iterator as $key => $value) {
    echo "$key: $value<br>";
}

// SPL iterators
// DirectoryIterator
$dir = new DirectoryIterator('/path/to/directory');
foreach ($dir as $fileInfo) {
    if ($fileInfo->isFile()) {
