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

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['calculate'])) {
                    $response = $this->handleCalculation($_POST);
                } elseif (isset($_POST['submit'])) {
                    $response = $this->handleSubmission($_POST);
                } elseif (isset($_POST['retrieve'])) {
                    $response = $this->handleRetrieval($_POST);
                } elseif (isset($_POST['delete'])) {
                    $response = $this->handleDeletion($_POST);
                }
            }
        } catch (Exception $e) {
            $response['message'] = "Error: " . $e->getMessage();
        }

        return $response;
    }
