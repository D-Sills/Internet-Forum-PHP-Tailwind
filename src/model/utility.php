<?php

function clean_topic_name_for_url($topicName) {
    // Convert the topic name to lowercase
    $cleanedName = strtolower($topicName);

    // Replace spaces with hyphens
    $cleanedName = str_replace(' ', '-', $cleanedName);

    // Remove special characters (except hyphens) using regex
    $cleanedName = preg_replace('/[^a-z0-9\-]/', '', $cleanedName);

    // Remove any consecutive hyphens and trailing hyphens
    $cleanedName = preg_replace('/-+/', '-', $cleanedName);
    $cleanedName = trim($cleanedName, '-');

    return $cleanedName;
}


// Function to calculate "time ago"
function time_ago($timestamp) {
    $datetime = new DateTime($timestamp, new DateTimeZone('Asia/Tokyo')); // Create a DateTime object with the provided timestamp
    $datetime->setTimezone(new DateTimeZone('Asia/Tokyo')); // Replace 'Your_Timezone' with the appropriate timezone

    $current_time = new DateTime('now', new DateTimeZone('Asia/Tokyo')); // Replace 'Your_Timezone' with the appropriate timezone

    $diff = $current_time->diff($datetime);

    if ($diff->y > 0) {
        return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    } elseif ($diff->m > 0) {
        return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d > 0) {
        return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h > 0) {
        return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i > 0) {
        return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
    } else {
        return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
    }
}


function generate_avatar($username, $userId, $image_size = 50) {
    $avatar_url = 'path/to/default_avatar.jpg';
    $base_url = 'WebProgramming-FinalProject';
    
    $avatar_html = '<a href="/'.$base_url.'/user/'.clean_topic_name_for_url($username).$userId.'">';
    $avatar_html .= '<img class="avatar" src="'.$avatar_url.'" alt="'.$username.'" width="'.$image_size.'" height="'.$image_size.'">';
    $avatar_html .= '</a>';

    return $avatar_html;
}

function searchForum($searchQuery) {
    global $db;

    // Perform your database query here to search for matching posts
    // Modify the SQL query according to your database schema and search requirements
    $query = "SELECT * FROM posts WHERE post_content LIKE :search_query";

    $statement = $db->prepare($query);
    $statement->bindValue(':search_query', "%{$searchQuery}%");
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

?>