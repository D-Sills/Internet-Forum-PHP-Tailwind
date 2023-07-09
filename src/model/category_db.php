<?php
require_once('database.php');

function get_thread_count_by_topic($topic_id) {
    global $db;

    $query = "SELECT COUNT(*) AS thread_count FROM threads WHERE topic_id = :topic_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? (int)$result['thread_count'] : 0; // Return the thread count or 0 if not found
}

function get_post_count_by_topic($topic_id) {
    global $db;

    $query = "SELECT thr.topic_id, COUNT(*) AS post_count FROM posts p
                INNER JOIN threads thr ON p.thread_id = thr.thread_id
                WHERE thr.topic_id = :topic_id
                GROUP BY thr.topic_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
    return $result ? (int)$result[$topic_id] : 0; // Return the post count for the specific topic or 0 if not found
}

?>