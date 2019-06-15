<?php
class PensionCalculator {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function calculate($monthlySalary, $employeePeriod, $benefitPercentage) {
        $totalAmount = $monthlySalary * $employeePeriod * ($benefitPercentage / 100);
        $amountPerMonth = $totalAmount / ($employeePeriod * 12);
        
        return [
            'totalAmount' => $totalAmount,
            'amountPerMonth' => $amountPerMonth
        ];
    }

    public function save($data) {
