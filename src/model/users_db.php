<?php
require_once('database.php');
function get_user_stats($user_id) {
    global $db;

    // Get total likes given
    $query_likes_given = "SELECT COUNT(*) AS total_likes_given FROM post_likes WHERE user_id = :user_id";
    $statement_likes_given = $db->prepare($query_likes_given);
    $statement_likes_given->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement_likes_given->execute();
    $total_likes_given = $statement_likes_given->fetchColumn();

    // Get total likes received
    $query_likes_received = "SELECT COUNT(*) AS total_likes_received
                            FROM post_likes pl
                            JOIN posts p ON pl.post_id = p.post_id
                            WHERE p.user_id = :user_id";
    $statement_likes_received = $db->prepare($query_likes_received);
    $statement_likes_received->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement_likes_received->execute();
    $total_likes_received = $statement_likes_received->fetchColumn();

    // Get total posts made
    $query_posts = "SELECT COUNT(*) AS total_posts FROM posts WHERE user_id = :user_id";
    $statement_posts = $db->prepare($query_posts);
    $statement_posts->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement_posts->execute();
    $total_posts = $statement_posts->fetchColumn();

    // Return the user stats as an associative array
    return array(
        'total_likes_given' => $total_likes_given,
        'total_likes' => $total_likes_received,
        'total_posts' => $total_posts
    );
}


function get_user_activity($user_id, $limit = null, $offset = null) {
    global $db;
    $query = "(SELECT p.post_content AS activity_content, p.creation_date AS activity_date, 
                t.thread_name AS thread_name, t.creation_date AS thread_date,
                t.thread_id AS thread_id, 'post' AS activity_type
                FROM posts p
                JOIN threads t ON p.thread_id = t.thread_id
                WHERE p.user_id = :user_id)
                
                UNION ALL
                
                (SELECT '' AS activity_content, lp.creation_date AS activity_date,
                t.thread_name AS thread_name, t.creation_date AS thread_date,
                t.thread_id AS thread_id, 'like' AS activity_type
                FROM post_likes l
                JOIN posts lp ON l.post_id = lp.post_id
                JOIN threads t ON lp.thread_id = t.thread_id
                WHERE l.user_id = :user_id)
                
                UNION ALL
                
                (SELECT '' AS activity_content, t.creation_date AS activity_date,
                t.thread_name AS thread_name, t.creation_date AS thread_date,
                t.thread_id AS thread_id, 'create' AS activity_type
                FROM threads t
                WHERE t.user_id = :user_id)
                
                ORDER BY activity_date DESC";

    if ($limit !== null) {
        $query .= " LIMIT :limit";
    }

    if ($offset !== null) {
        $query .= " OFFSET :offset";
    }

    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    if ($limit !== null) {
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    if ($offset !== null) {
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    }
    $statement->execute();
    $activity = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $activity;
}

?>
