<?php
require_once('database.php');

function count_threads_by_topic_id($topic_id) {
    global $db;
    $query = "SELECT COUNT(*) AS thread_count
                FROM threads
                WHERE topic_id = :topic_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['thread_count'];
}

function get_threads_by_topic_id($topic_id, $limit = null, $offset = null) {
    global $db;
    $query = "SELECT t.thread_id, t.thread_name, t.creation_date, t.user_id AS creator_id, 
                u.username AS creator_username
                FROM threads t
                INNER JOIN users u ON t.user_id = u.user_id
                WHERE t.topic_id = :topic_id
                ORDER BY t.creation_date DESC";

    if ($limit !== null) {
        $query .= " LIMIT $limit";
    }

    if ($offset !== null) {
        $query .= " OFFSET $offset";
    }

    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();
    $threads = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $threads;
}

function get_topic($topic_id) {
    global $db;
    $query = "SELECT t.topic_id, t.topic_name, t.topic_icon, t.topic_description, 
                c.category_id, c.category_name
                FROM topics t
                INNER JOIN categories c ON t.category_id = c.category_id
                WHERE t.topic_id = :topic_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result ? $result : null;
}

?>

