<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/model/utility.php';
require_once __DIR__ . '/src/model/global.php';

$requestUrl = $_SERVER['REQUEST_URI'];

if (preg_match('#^/WebProgramming-FinalProject/topic/([^/.]+)\.(\d+)(?:\?.*)?$#', $requestUrl, $matches)) {
    $topicName = $matches[1];
    $topicId = $matches[2];
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    include __DIR__ . '/src/controller/threads_controller.php';
} else {
    include __DIR__ . '/src/controller/home_controller.php';
}
?>
