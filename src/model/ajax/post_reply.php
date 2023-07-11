<?php
// Start the session and include necessary files
session_start();
require_once '../database.php';
global $db;

// Get the reply content and associated thread ID from the request data
$content = $_POST['content'];
$thread_id = $_POST['threadId'];

// Assuming you have a database connection established ($db)
// Insert the new reply into the database
$query = "INSERT INTO posts (post_content, user_id, thread_id) VALUES (:content, :user_id, :thread_id)";
$statement = $db->prepare($query);
$statement->bindParam(':content', $content);
$statement->bindParam(':user_id', $_SESSION['user']['user_id']);
$statement->bindParam(':thread_id', $thread_id);

if ($statement->execute()) {
  // Reply posted successfully
  $response = ['success' => true, 'message' => 'Reply posted successfully'];
} else {
  // Failed to post reply
  $response = ['success' => false, 'message' => 'Failed to post reply'];
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>

