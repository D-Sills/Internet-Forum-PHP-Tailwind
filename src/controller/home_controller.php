<!-- controllers/home_controller.php -->
<?php
require_once __DIR__ .'/../model/category_db.php';
require_once __DIR__ .'/../model/sidebar_db.php';

$categories = get_categories();
$topics = get_topics();
$latest_posts = get_latest_posts();
$forum_stats = get_forum_stats();

$page = "Home";
$title = "Home";

include __DIR__ .'/../view/header.php';
include __DIR__ .'/../view/navbar.php';
include __DIR__ .'/../view/body.php';
include __DIR__ .'/../view/footer.php';
?>
