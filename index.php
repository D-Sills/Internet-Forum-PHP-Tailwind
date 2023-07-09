<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$base_url = 'WebProgramming-FinalProject';

require_once __DIR__ . '/src/model/utility.php';
require_once __DIR__ . '/src/model/global.php';

session_start();

if (isset($_SESSION['user']))
    $user = $_SESSION['user'];
else $user = null;

$requestUrl = $_SERVER['REQUEST_URI'];

switch (true) {
    case preg_match('#^/'.$base_url.'/topics/([^/.]+)\.(\d+)(?:\?.*)?$#', $requestUrl, $matches):
        $topicId = $matches[2];
        $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        include __DIR__ . '/src/controller/threads_controller.php';
        break;

    case preg_match('#^/'.$base_url.'/threads/([^/.]+)\.(\d+)(?:\?.*)?$#', $requestUrl, $matches):
        $threadId = $matches[2];
        $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        include __DIR__ . '/src/controller/posts_controller.php';
        break;
        
    case preg_match('#^/'.$base_url.'/user/([^/.]+)\.(\d+)(?:\?.*)?$#', $requestUrl, $matches):
        $userId = $matches[2];
        include __DIR__ . '/src/controller/user_page_controller.php';
        break;

    default:
        include __DIR__ . '/src/controller/home_controller.php';
        break;
}

?>
