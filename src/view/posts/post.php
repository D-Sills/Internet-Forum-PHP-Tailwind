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
                            echo 'moderator';
                            break;
                        case 'admin':
                            echo 'administrator';
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
                
                <span class="text-xs">
                <?php if ($user) { ?>
                <button id="likeButton_<?php echo $post['post_id']; ?>" data-post-id="<?php echo $post['post_id'];?>"><i class="bi bi-hand-thumbs-up pr-2"></i>
                </button>
                <button id="deleteButton_<?php echo $post['post_id']; ?>" data-post-id="<?php echo $post['post_id'];?>"><i class="bi bi-x-circle pr-2"></i>
                </button>
                <?php } ?>
                #<?php echo $postIndex; ?></span>
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

<script>


$(document).ready(function() {
    // Bind the click event to each like button using a unique identifier
    $('#likeButton_<?php echo $post['post_id']; ?>').on('click', function() {
        event.preventDefault(); 

        var postId = $(this).data('post-id');

        // Send AJAX request to like the post
        $.ajax({
            url: '/finalteam9/src/model/ajax/like_post.php', // Backend URL to handle liking the post
            type: 'POST',
            data: { postId: postId },
            dataType: 'json',
            success: function(response) {
                // Handle success response
                console.log('Post successfully liked:', response);
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.log('Failed to like post:', error);
            }
        });
    });
});

// Bind the click event to each delete button using a unique identifier
$('#deleteButton_<?php echo $post['post_id']; ?>').on('click', function() {
    event.preventDefault();

    var postId = $(this).data('post-id');

    // Check if the user is an admin or the owner of the post
    var isAdmin = <?php echo $user['privilege'] == 'admin' ? 'true' : 'false'; ?>;
    var isOwner = <?php echo $user && $user['user_id'] === $post['user_id'] ? 'true' : 'false'; ?>;

    // Confirm the deletion
    var confirmationMessage = isAdmin ? 'Are you sure you want to delete this post?' : 'Are you sure you want to delete your post?';
    if (!confirm(confirmationMessage)) {
        return;
    }

    // Send AJAX request to delete the post
    $.ajax({
        url: '/finalteam9/src/model/ajax/delete_post.php', // Backend URL to handle post deletion
        type: 'POST',
        data: { postId: postId },
        dataType: 'json',
        success: function(response) {
            // Handle success response
            console.log('Post deleted successfully:', response);
            location.reload();
            // Reload or update the post list
            // ...
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.log('Failed to delete post:', error);
        }
    });
});
</script>







