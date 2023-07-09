<!-- controllers/posts_controller.php -->
<?php
require_once __DIR__ . '/../model/posts_db.php';
require_once __DIR__ .'/../model/sidebar_db.php';

$postsPerPage = 10;

$totalPosts = count_posts_by_thread_id($threadId);
$totalPages = ceil($totalPosts / $postsPerPage);
$pageNumber = max(1, min($totalPages, $pageNumber));
$offset = ($pageNumber - 1) * $postsPerPage;
$posts = get_posts_by_thread_id($threadId, $postsPerPage, $offset);

$latest_posts = get_latest_posts();
$forum_stats = get_forum_stats();

$page = 'Posts';
$thread = get_thread($threadId);
$title = $thread['thread_subject'];

include __DIR__ . '/../view/header.php';
include __DIR__ . '/../view/navbar.php';
include __DIR__ . '/../view/body.php';
include __DIR__ . '/../view/footer.php';
?>
