<?php
// Start the session
session_start();
require_once '../database.php';
global $db;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Get the submitted email and password
  $email = $_POST['loginEmail'];
  $password = $_POST['loginPassword'];  

  // Validate the email and password (perform necessary checks, e.g., length, format, etc.)

  // Assuming you have a database connection established ($db)
  // Query the database to check if the user exists
  $query = "SELECT * FROM users WHERE email = :email";
  $statement = $db->prepare($query);
  $statement->bindParam(':email', $email);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  // Check if the user exists and the password matches
  if ($user && password_verify($password, $user['password'])) {
    // Set the user as authenticated in the session
    $_SESSION['user'] = $user;

    // Return a success response
    $response = ['success' => true];
  } else {
    // Return an error response
    $response = ['success' => false, 'message' => 'Incorrect email or password'];
  }
} else {
  // Return an error response
  $response = ['success' => false, 'message' => 'Invalid request'];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>

