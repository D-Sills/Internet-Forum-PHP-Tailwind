<!-- controllers/threads_controller.php -->
<?php
require_once __DIR__ . '/../model/threads_db.php';
require_once __DIR__ .'/../model/sidebar.php';

// Set the number of threads to display per page
$threadsPerPage = 10;

$totalThreads = count_threads_by_topic_id($topicId);
$totalPages = ceil($totalThreads / $threadsPerPage);
$pageNumber = max(1, min($totalPages, $pageNumber));
$offset = ($pageNumber - 1) * $threadsPerPage;
$threads = get_threads_by_topic_id($topicId, $threadsPerPage, $offset);

$latest_posts = get_latest_posts();
$forum_stats = get_forum_stats();

$page = 'Threads';
$title = get_topic_title($topicId);

// Now, you can include the header, navbar, and the topic_threads.php view
include __DIR__ . '/../view/header.php';
include __DIR__ . '/../view/navbar.php';
include __DIR__ . '/../view/body.php';
include __DIR__ . '/../view/footer.php';
?>