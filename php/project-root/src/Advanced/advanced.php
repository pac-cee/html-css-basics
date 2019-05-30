<?php
/**
 * ADVANCED PHP TECHNIQUES
 * - Namespaces
 * - Traits
 * - Anonymous functions
 */

namespace MyApp\Utilities;

trait Logger {
    protected function log(string $message): void {
        file_put_contents('app.log', date('Y-m-d H:i:s') . " $message\n", FILE_APPEND);
    }
}

class DataProcessor {
    use Logger;

