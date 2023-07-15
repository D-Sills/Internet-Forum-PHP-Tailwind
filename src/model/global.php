<?php
require_once('database.php');

function get_categories() {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT * FROM categories";
    $statement = $db->prepare($query);
    $statement->execute();

    // Fetch and return the categories data
    return $statement->fetchAll();
}

function get_topics() {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT * FROM topics";
    $statement = $db->prepare($query);
    $statement->execute();

    // Fetch and return the categories data
    return $statement->fetchAll();
}

function get_posts() {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT * FROM posts";
    $statement = $db->prepare($query);
    $statement->execute();

    // Fetch and return the categories data
    return $statement->fetchAll();
}

function get_users() {
    global $db; // Make sure to access the $db PDO object declared in the global scope

    $query = "SELECT * FROM users";
    $statement = $db->prepare($query);
    $statement->execute();

    // Fetch and return the categories data
    return $statement->fetchAll();
}

function get_user_by_id($user_id) {
    global $db;

    $query = "SELECT * FROM users WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    // Fetch and return the user object
    return $statement->fetch(PDO::FETCH_ASSOC);
}
?>


