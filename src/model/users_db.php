<?php
require_once('database.php');

function get_user_stats($user_id) {
    global $db;

    // Get total likes received
    $query_likes = "SELECT COUNT(*) AS total_likes FROM post_likes WHERE user_id = :user_id";
    $statement_likes = $db->prepare($query_likes);
    $statement_likes->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement_likes->execute();
    $total_likes = $statement_likes->fetchColumn();

    // Get total posts made
    $query_posts = "SELECT COUNT(*) AS total_posts FROM posts WHERE user_id = :user_id";
    $statement_posts = $db->prepare($query_posts);
    $statement_posts->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement_posts->execute();
    $total_posts = $statement_posts->fetchColumn();

    // Return the user stats as an associative array
    return array(
        'total_likes' => $total_likes,
        'total_posts' => $total_posts
    );
}

function get_user_activity($user_id, $limit = null, $offset = null) {
    global $db;
    $query = "SELECT p.post_content, p.creation_date, t.thread_name, t.creation_date AS thread_date
                FROM posts p
                JOIN threads t ON p.thread_id = t.thread_id
                WHERE p.user_id = :user_id
                ORDER BY p.creation_date DESC";

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
