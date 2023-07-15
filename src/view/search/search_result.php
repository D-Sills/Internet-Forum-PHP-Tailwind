<?php 
$thread = get_thread($result['thread_id']);
$user = get_user_by_id($result['user_id']);
?>

<div class="p-0 drop-shadow">
<div class="w-100 border-b">
    <div class="d-flex align-items-center px-3">
        <!-- Icon -->
        <div class="pr-4">
            <?php echo generate_avatar($user, 60); ?>
        </div>
        
        <!-- Topic Info -->
        <div class="py-2">
            <a href="/<?php echo $base_url; ?>/threads/<?php echo clean_topic_name_for_url($thread['thread_name']); ?>.<?php echo $thread['thread_id']; ?>?page=1">
                <h4 class="text-md"><?php echo $thread['thread_name']; ?></h4>
                <p class="text-sm"><?php echo $result['post_content']; ?></p>
                <div >
                    <span class="text-xs"><?php echo $user['username']; ?> &#183; <?php echo convert_timestamp($thread['creation_date']) ?> &#183; <?php echo $thread['topic_name']; ?></span>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
