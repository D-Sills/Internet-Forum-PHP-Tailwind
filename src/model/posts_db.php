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

function get_thread($thread_id) {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT t.thread_id, t.thread_subject, t.thread_date, t.user_id AS thread_user_id,
                tp.topic_id, tp.topic_subject, c.category_id, c.category_name
                FROM threads t
                INNER JOIN topics tp ON t.topic_id = tp.topic_id
                INNER JOIN categories c ON tp.category_id = c.category_id
                WHERE t.thread_id = :thread_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null; // Return the thread details along with the associated topic and category or null if not found
}

function get_post($post_id) {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT p.post_id, p.post_content, p.post_date, p.user_id AS post_user_id, 
                t.thread_id, t.thread_subject,
                tp.topic_id, tp.topic_subject
                FROM posts p
                INNER JOIN threads t ON p.thread_id = t.thread_id
                INNER JOIN topics tp ON t.topic_id = tp.topic_id
                WHERE p.post_id = :post_id";
    
    $statement = $db->prepare($query);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null; // Return the post details along with the associated thread and topic or null if not found
}


?>
