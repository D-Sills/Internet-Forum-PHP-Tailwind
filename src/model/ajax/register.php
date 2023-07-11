<?php
// Start the session
session_start();
require_once('../database.php');
global $db;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted username, email, and password
  $username = $_POST['registerUsername'];
  $email = $_POST['registerEmail'];
  $password = $_POST['registerPassword'];

  // Validate the username, email, and password (perform necessary checks, e.g., length, format, etc.)

  // Assuming you have a database connection established ($db)
  // Check if the username or email already exists in the database
  $query = "SELECT * FROM users WHERE username = :username OR email = :email";
  $statement = $db->prepare($query);
  $statement->bindParam(':username', $username);
  $statement->bindParam(':email', $email);
  $statement->execute();
  $existingUser = $statement->fetch(PDO::FETCH_ASSOC);

  if ($existingUser) {
    // Return an error response if the username or email already exists
    $response = ['success' => false, 'message' => 'Username or email already exists'];
  } else {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $statement = $db->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $hashedPassword);
    $statement->execute();

    // Set the user as authenticated in the session (optional)
    $_SESSION['user'] = ['username' => $username, 'email' => $email];

    // Return a success response
    $response = ['success' => true];
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


