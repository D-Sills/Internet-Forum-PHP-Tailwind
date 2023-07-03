<?php
    $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=discussion_forum'; // Change "localhost" to your database host if needed
    $username = 'root';  // Your username for logging in to the database server
    $password = 'jimmy1';  // Your password for logging in to the database server

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('../errors/database_error.php');
        exit();
    }
?>