<?php
    $dsn = 
    'mysql:host=172.21.82.208;
    port=3306;
    dbname=finalteam9'
    ; // Change "localhost" to your database host if needed
    $username = 'finalteam9';  // Your username for logging in to the database server
    $password = 'XtESlyujQd';  // Your password for logging in to the database server

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
?>