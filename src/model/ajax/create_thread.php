<?php
// Start the session
session_start();
require_once('../database.php');
global $db;

// Get the form data
$title = $_POST['title'];
$content = $_POST['content'];
$topic_id = $_POST['topicId'];
// Perform necessary checks/validation on the form data
// ...

// Assuming you have a database connection established ($db)

// Insert the new thread into the database
$query = "INSERT INTO threads (thread_name, creation_date, user_id, topic_id) VALUES (:title, NOW(), :user_id, :topic_id)";
$statement = $db->prepare($query);
$statement->bindParam(':title', $title);
$statement->bindParam(':user_id', $_SESSION['user']['user_id']);
$statement->bindParam(':topic_id', $topic_id); // Replace with the actual topic ID

if ($statement->execute()) {
  // Get the ID of the newly created thread
  $threadId = $db->lastInsertId();
  
  // Insert the post into the database
  $postQuery = "INSERT INTO posts (post_content, creation_date, user_id, thread_id) VALUES (:content, NOW(), :user_id, :thread_id)";
  $postStatement = $db->prepare($postQuery);
  $postStatement->bindParam(':content', $content);
  $postStatement->bindParam(':user_id', $_SESSION['user']['user_id']);
  $postStatement->bindParam(':thread_id', $threadId);

  if ($postStatement->execute()) {
    // Thread and post creation successful
    $response = ['success' => true, 'message' => 'Thread and post created successfully'];
  } else {
    // Post creation failed
    $response = ['success' => false, 'message' => 'Failed to create post'];
  }
} else {
  // Thread creation failed
  $response = ['success' => false, 'message' => 'Failed to create thread'];
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
