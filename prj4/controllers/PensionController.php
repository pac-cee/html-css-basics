<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/PensionCalculator.php';

class PensionController {
    private $calculator;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->calculator = new PensionCalculator($this->db->getConnection());
    }

    public function handleRequest() {
        $response = [
            'success' => false,
            'message' => '',
            'data' => null
        ];
