<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$base_url = 'finalteam9';

require_once __DIR__ . '/src/model/utility.php';
require_once __DIR__ . '/src/model/global.php';

if (isset($_SESSION['user']))
    $user = $_SESSION['user'];
else $user = null;

$requestRoute = $_GET['route'] ?? '';
$requestId = $_GET['id'] ?? '';

switch ($requestRoute) {
    case 'topics':
        $topicId = $requestId;
        $pageNumber = $_GET['page'] ?? 1;
        include __DIR__ . '/src/controller/threads_controller.php';
        break;
    case 'threads':
        $threadId = $requestId;
        $pageNumber = $_GET['page'] ?? 1;
        include __DIR__ . '/src/controller/posts_controller.php';
        break;
    case 'user':
        $userId = $requestId;
        include __DIR__ . '/src/controller/user_page_controller.php';
        break;
    case 'search':
        $searchQuery = $_GET['query'] ?? '';
        include __DIR__ . '/src/controller/search_controller.php';
        break;
    default:
        include __DIR__ . '/src/controller/home_controller.php';
        break;
}


