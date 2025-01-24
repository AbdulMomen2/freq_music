<?php
session_start();

// Get the submitted code
$inputCode = json_decode(file_get_contents('php://input'), true)['code'];

// Check if the code matches the stored session code
if (isset($_SESSION['verification_code']) && $_SESSION['verification_code'] == $inputCode) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
