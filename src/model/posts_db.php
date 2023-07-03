<?php
require_once('database.php');

function count_posts_by_thread_id($thread_id) {
    global $db;
    $query = "SELECT COUNT(*) AS post_count
                FROM posts
                WHERE thread_id = :thread_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['post_count'];
}

function get_posts_by_thread_id($thread_id, $limit = null, $offset = null) {
    global $db;
    $query = "SELECT p.post_id, p.post_content, p.post_date,
                u.username AS username
                FROM posts p
                INNER JOIN users u ON p.user_id = u.user_id
                WHERE p.thread_id = :thread_id
                ORDER BY p.post_date DESC";

    if ($limit !== null) {
        $query .= " LIMIT $limit";
    }

    if ($offset !== null) {
        $query .= " OFFSET $offset";
    }

    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function get_thread_title($thread_id) {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT thread_subject FROM threads WHERE thread_id = :thread_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result['thread_subject'];
    } else {
        return null; // Topic not found or error occurred
    }
}
?>
