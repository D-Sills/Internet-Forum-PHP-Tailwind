<!-- controllers/threads_controller.php -->
<?php
require_once __DIR__ . '/../model/threads_db.php';
require_once __DIR__ .'/../model/sidebar_db.php';

$threadsPerPage = 10;

$totalThreads = count_threads_by_topic_id($topicId);
$totalPages = ceil($totalThreads / $threadsPerPage);
$pageNumber = max(1, min($totalPages, $pageNumber));
$offset = ($pageNumber - 1) * $threadsPerPage;
$threads = get_threads_by_topic_id($topicId, $threadsPerPage, $offset);

$latest_posts = get_latest_posts();
$forum_stats = get_forum_stats();

$page = 'Threads';
$topic = get_topic($topicId);
$title = $topic['topic_name'];

include __DIR__ . '/../view/header.php';
include __DIR__ . '/../view/navbar.php';
include __DIR__ . '/../view/body.php';
include __DIR__ . '/../view/footer.php';
?>