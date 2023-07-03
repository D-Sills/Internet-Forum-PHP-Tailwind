<?php
require_once('database.php');

function get_thread_count_by_topic() {
    global $db;

    $query = "SELECT topic_id, COUNT(*) AS thread_count FROM topics GROUP BY topic_id";
    $statement = $db->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_KEY_PAIR);
}

function get_post_count_by_topic() {
    global $db;

    $query = "SELECT thr.topic_id, COUNT(*) AS post_count FROM posts p
                INNER JOIN threads thr ON p.thread_id = thr.thread_id
                GROUP BY thr.topic_id";

    $statement = $db->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_KEY_PAIR);
}


?>