
<?php
session_start();

// Generate a random 3-digit code
$code = rand(100, 999);

// Store the code in the session
$_SESSION['verification_code'] = $code;

// Save the code to a JSON file
$filePath = 'validation_code.json';
$data = ['code' => $code];

// Write the data to the JSON file
file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

// Return the code (for testing purposes, you can remove this in production)
header('Content-Type: application/json');
echo json_encode($data);
?>
