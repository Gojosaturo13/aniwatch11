<?php
// API endpoint to help Vercel detect PHP runtime
// This file helps Vercel's build system recognize this as a PHP project

header('Content-Type: application/json');

$response = [
    'message' => 'Anipaca API is running!',
    'status' => 'success',
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => PHP_VERSION
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>