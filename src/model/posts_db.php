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
    $query = "SELECT p.post_id, p.post_content, p.creation_date,
                p.user_id AS user_id, u.username AS username
                FROM posts p
                INNER JOIN users u ON p.user_id = u.user_id
                WHERE p.thread_id = :thread_id
                ORDER BY p.creation_date ASC";

    if ($limit !== null) {
        $query .= " LIMIT :limit";
    }

    if ($offset !== null) {
        $query .= " OFFSET :offset";
    }

    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    if ($limit !== null) {
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    if ($offset !== null) {
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    }
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function get_post_likes($post_id) {
    global $db;
    $query = "SELECT u.user_id, u.username
                FROM post_likes pl
                INNER JOIN users u ON pl.user_id = u.user_id
                WHERE pl.post_id = :post_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();
    $likes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $likes;
}

function get_thread($thread_id) {
    global $db;
    $query = "SELECT t.thread_id, t.thread_name, t.creation_date, t.user_id AS thread_user_id,
                tp.topic_id, tp.topic_name, c.category_id, c.category_name,
                u.username AS thread_creator_username
                FROM threads t
                INNER JOIN topics tp ON t.topic_id = tp.topic_id
                INNER JOIN categories c ON tp.category_id = c.category_id
                INNER JOIN users u ON t.user_id = u.user_id
                WHERE t.thread_id = :thread_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null;
}


function get_post($post_id) {
    global $db;
    $query = "SELECT p.post_id, p.post_content, p.creation_date, p.user_id AS post_user_id, 
                t.thread_id, t.thread_name,
                tp.topic_id, tp.topic_name
                FROM posts p
                INNER JOIN threads t ON p.thread_id = t.thread_id
                INNER JOIN topics tp ON t.topic_id = tp.topic_id
                WHERE p.post_id = :post_id";
    
    $statement = $db->prepare($query);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null;
}



?>
