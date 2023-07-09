<?php
require_once('database.php');

function get_user_by_id($user_id) {
    global $db;
    $query = "SELECT * FROM users WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function count_user_posts($user_id) {
    global $db;
    $query = "SELECT COUNT(*) AS post_count FROM posts WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['post_count'];
}

function get_user_activity($user_id, $limit = null, $offset = null) {
    global $db;
    $query = "SELECT p.post_content, p.post_date, t.thread_subject, t.thread_date
                FROM posts p
                JOIN threads t ON p.thread_id = t.thread_id
                WHERE p.user_id = :user_id
                ORDER BY p.post_date DESC";

    if ($limit !== null) {
        $query .= " LIMIT $limit";
    }

    if ($offset !== null) {
        $query .= " OFFSET $offset";
    }

    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $activity = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $activity;
}

?>
