<?php
// Start the session
session_start();

// Clear specific session variables
unset($_SESSION['user']); // Assuming 'user' is the session variable storing user details

// Alternatively, you can destroy the entire session
// session_destroy();

// Return a success response
$response = ['success' => true];
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
