<?php
require_once('database.php');

function get_latest_posts($limit = 5) {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT p.post_content, p.post_date, u.username, t.topic_subject, c.category_name
                FROM posts p
                INNER JOIN users u ON p.user_id = u.user_id
                INNER JOIN threads thr ON p.thread_id = thr.thread_id
                INNER JOIN topics t ON thr.topic_id = t.topic_id
                INNER JOIN categories c ON t.category_id = c.category_id
                ORDER BY p.post_date DESC
                LIMIT :limit";

    $statement = $db->prepare($query);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();

    // Fetch and return the latest posts data
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_forum_stats() {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    // Get total posts count
    $query_posts = "SELECT COUNT(*) AS total_posts FROM posts";
    $statement_posts = $db->prepare($query_posts);
    $statement_posts->execute();
    $total_posts = $statement_posts->fetchColumn();

    // Get total threads count
    $query_threads = "SELECT COUNT(*) AS total_threads FROM threads";
    $statement_threads = $db->prepare($query_threads);
    $statement_threads->execute();
    $total_threads = $statement_threads->fetchColumn();

    // Get total members count
    $query_members = "SELECT COUNT(*) AS total_members FROM users";
    $statement_members = $db->prepare($query_members);
    $statement_members->execute();
    $total_members = $statement_members->fetchColumn();

    // Get the newest member
    $query_newest_member = "SELECT username FROM users ORDER BY registration_date DESC LIMIT 1";
    $statement_newest_member = $db->prepare($query_newest_member);
    $statement_newest_member->execute();
    $newest_member = $statement_newest_member->fetchColumn();

    // Return the forum stats as an associative array
    return array(
        'total_posts' => $total_posts,
        'total_threads' => $total_threads,
        'total_members' => $total_members,
        'newest_member' => $newest_member
    );
}
?>