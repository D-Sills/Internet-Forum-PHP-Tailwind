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
    $query = "SELECT t.thread_id, t.thread_subject, t.user_id AS creator_id, t.thread_date,
                u.username AS creator_username
                FROM threads t
                INNER JOIN users u ON t.user_id = u.user_id
                WHERE t.topic_id = :topic_id
                ORDER BY t.thread_date DESC";

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
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT t.topic_id, t.topic_subject, t.topic_icon, t.topic_date, t.user_id AS topic_user_id, 
                c.category_id, c.category_name
                FROM topics t
                INNER JOIN categories c ON t.category_id = c.category_id
                WHERE t.topic_id = :topic_id";
    
    $statement = $db->prepare($query);
    $statement->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null; // Return the topic details along with its category or null if not found
}
?>

