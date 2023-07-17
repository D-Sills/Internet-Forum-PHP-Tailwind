<?php
// Start the session and include necessary files
session_start();
require_once '../database.php';
global $db;

// Get the post ID from the request data
$post_id = intval($_POST['postId']);

// Assuming you have a database connection established ($db)
// Check if the user has already liked the post
$query = "SELECT * FROM post_likes WHERE user_id = :user_id AND post_id = :post_id";
$statement = $db->prepare($query);
$statement->bindParam(':user_id', $_SESSION['user']['user_id']);
$statement->bindParam(':post_id', $post_id);
$statement->execute();
$existingLike = $statement->fetch(PDO::FETCH_ASSOC);

if ($existingLike) {
  // User has already liked the post, so unlike it
  $query = "DELETE FROM post_likes WHERE user_id = :user_id AND post_id = :post_id";
  $message = 'Post unliked successfully';
} else {
  // User has not liked the post, so like it
  $query = "INSERT INTO post_likes (user_id, post_id) VALUES (:user_id, :post_id)";
  $message = 'Post liked successfully';
}

// Perform the like/unlike operation
$statement = $db->prepare($query);
$statement->bindParam(':user_id', $_SESSION['user']['user_id']);
$statement->bindParam(':post_id', $post_id);

if ($statement->execute()) {
  // Like/unlike operation successful
  $response = ['success' => true, 'message' => $message];
} else {
  // Failed to perform like/unlike operation
  $response = ['success' => false, 'message' => 'Failed to like/unlike post'];
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
