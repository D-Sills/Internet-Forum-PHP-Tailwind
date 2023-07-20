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

function convert_timestamp($timestamp) {
    $date = new DateTime($timestamp);
    return $date->format('M j, Y');
}

function generateRandomColor($username) {
    // Convert the username to a unique numerical value
    $numericValue = crc32($username);
    
    // Generate RGB values based on the numerical value
    $red = ($numericValue & 0xFF0000) >> 16;
    $green = ($numericValue & 0x00FF00) >> 8;
    $blue = $numericValue & 0x0000FF;
    
    // Format the RGB values as a hexadecimal color code
    $color = sprintf("#%02x%02x%02x", $red, $green, $blue);
    
    return $color;
}

function generate_avatar($user, $image_size = '50px') {
    $avatar_url = 'path/to/default_avatar.jpg';
    $base_url = 'finalteam9';
    
    $avatar_html = '<a href="/'.$base_url.'/?route=user&id='.$user['user_id'].'">';
    if ($user['avatar'] == 0) {
        // Generate random background color
        $backgroundColor = generateRandomColor($user['username']);
        
        // Get the first letter of the username
        $firstLetter = strtoupper(substr($user['username'], 0, 1));
        
        // Set the avatar HTML with the background color and first letter
        $avatar_html .= '<div class="avatar" style="width: ' . $image_size . 'px; height: ' . $image_size . 'px; background-color: ' . $backgroundColor . '; display: flex; justify-content: center; align-items: center; color: #fff; font-weight: bold; font-size: ' . ($image_size * 0.5) . 'px;">' . $firstLetter . '</div>';
    } else {
        $avatar_html .= '<img class="avatar" src="'.$avatar_url.'" alt="'.$user['username'].'" width="'.$image_size.'" height="'.$image_size.'">';
    }
    
    $avatar_html .= '</a>';

    return $avatar_html;
}

function searchForum($searchQuery, $searchType) {
    global $db;

    // Modify the SQL query based on the search type
    $query = "";
    switch ($searchType) {
        case 'Threads':
            $query = "SELECT t.*, COUNT(p.post_id) AS post_count
                        FROM threads t
                        LEFT JOIN posts p ON t.thread_id = p.thread_id
                        WHERE t.thread_name LIKE :search_query
                        GROUP BY t.thread_id";
            break;
        case 'Posts':
            $query = "SELECT p.*, t.thread_id 
                        FROM posts p 
                        INNER JOIN threads t ON p.thread_id = t.thread_id 
                        WHERE p.post_content LIKE :search_query";
            break;
        case 'Members':
            $query = "SELECT * FROM users WHERE username LIKE :search_query";
            break;
        default:
            // Invalid search type, return an empty array
            return [];
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':search_query', "%{$searchQuery}%");
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


?>