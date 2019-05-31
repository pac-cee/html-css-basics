<?php
/**
 * INTERMEDIATE PHP CONCEPTS
 * - Functions
 * - Classes
 * - Error handling
 */

class Calculator {
    private float $result = 0;

    public function add(float $value): self {
        $this->result += $value;
        return $this;
    }

    public function getResult(): float {
        return $this->result;
    }
