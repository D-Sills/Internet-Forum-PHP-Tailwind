<!-- controllers/posts_controller.php -->
<?php
require_once __DIR__ . '/../model/posts_db.php';
require_once __DIR__ .'/../model/sidebar.php';

// Get the current page number from the URL query parameter
$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Set the number of posts to display per page
$postsPerPage = 10;

// Now you have the thread ID, and you can use it to fetch the corresponding posts
$totalPosts = count_posts_by_thread_id($threadId);
$totalPages = ceil($totalPosts / $postsPerPage);

// Make sure the page number is within valid range
$pageNumber = max(1, min($totalPages, $pageNumber));

// Calculate the offset for the SQL query
$offset = ($pageNumber - 1) * $postsPerPage;

// Fetch the posts for the current page
$posts = get_posts_by_thread_id($threadId, $postsPerPage, $offset);

// Set the $page variable to indicate that the current page is displaying the posts
$page = 'Posts';
$title = get_thread_title($threadId);

// Now, you can include the header, navbar, and the thread_posts.php view
include __DIR__ . '/../view/header.php';
include __DIR__ . '/../view/navbar.php';
include __DIR__ . '/../view/body.php';
include __DIR__ . '/../view/footer.php';
?>
