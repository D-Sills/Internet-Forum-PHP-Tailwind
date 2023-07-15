<!-- views/post.php -->
<?php 
$creator = get_user_by_id($post['user_id']); 
$stats = get_user_stats($post['user_id']);
?>

<div class="w-100 mb-3 rounded drop-shadow">
    <div class="d-flex">
        <!-- User Stats & Shit -->
        <div class="user-section p-2">
            <div class="flex justify-center">
                <?php echo generate_avatar($creator, 40) ?>
            </div>
            <div class="flex flex-col items-center">
                <span class="pt-2"><?php echo $creator['username']; ?></span>
                <div class="py-2">
                    <?php 
                    switch ($creator['privilege']) {
                        case 'moderator':
                            echo 'pop';
                            break;
                        case 'admin':
                            echo 'pop';
                            break;
                        default:
                            // Handle the default case here
                            break;
                    }
                    ?>
                </div>
            </div>
        
            <div class="d-flex justify-content-between text-sm">
                <div>
                    <p><i class="bi bi-person pr-1"></i></p>
                    <p><i class="bi bi-chat-left pr-1"></i></p>
                    <p><i class="bi bi-hand-thumbs-up pr-1"></i></p>
                </div>
                <div class="text-right">
                    <p><?php echo convert_timestamp($creator['registration_date']) ?></p>
                    <p><?php echo $stats['total_posts']; ?></p>
                    <p><?php echo $stats['total_likes']; ?></p>
                </div>
            </div>
        </div>

        <!-- Post Content -->
        <div class="w-100 p-3 flex flex-col">
            <!-- Header -->
            <div class="pb-2 flex justify-between">
                <span class="text-xs"><?php echo convert_timestamp($post['creation_date']) ?></span>
                <span class="text-xs"><button><i class="bi bi-hand-thumbs-up pr-2"></i></button>#<?php echo ($i + 1); ?></span>
            </div>
        
            <!-- Body -->
            <div class="pb-3">
                <p><?php echo $post['post_content']; ?></p>
            </div>
        
            <!-- Footer -->
            <div class="mt-auto">
                <?php
                $postLikes = get_post_likes($post['post_id']);
                $likeCount = count($postLikes);
                $maxDisplayCount = 3;
        
                if (!empty($postLikes)) {
                    if ($likeCount > $maxDisplayCount) {
                        $displayNames = array_column(array_slice($postLikes, 0, $maxDisplayCount), 'username');
                        $remainingCount = $likeCount - $maxDisplayCount;
                        $displayText = implode(', ', $displayNames) . ' and ' . $remainingCount . ' others';
                    } else {
                        $displayNames = array_column($postLikes, 'username');
                        $displayText = implode(', ', $displayNames);
                    }
        
                    echo '<p class="text-xs">This post was liked by ' . $displayText . '.</p>';
                } else {
                    echo '<div style="display:none;"></div>';
                }
                ?>
                <button class="text-xs">Report</button>
            </div>
        </div>

    </div>
</div>



