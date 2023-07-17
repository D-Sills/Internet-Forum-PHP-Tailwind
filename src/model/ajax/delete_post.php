<?php
// Start the session and include necessary files
session_start();
require_once '../database.php';
global $db;

// Get the post ID from the request data
$post_id = intval($_POST['postId']);

// Assuming you have a database connection established ($db)
// Delete the post
$query = "DELETE FROM posts WHERE post_id = :post_id";
$statement = $db->prepare($query);
$statement->bindParam(':post_id', $post_id);

if ($statement->execute()) {
    // Post deletion successful
    $response = ['success' => true, 'message' => 'Post deleted successfully'];
} else {
    // Failed to delete post
    $response = ['success' => false, 'message' => 'Failed to delete post'];
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
