<!-- views/latest_posts.php -->
<div class="w-100 pt-2">
<?php foreach ($latest_posts as $post): ?>

    <div class="d-flex align-items-center mb-3">
    
        <div class="mr-3">
            <?php echo generate_avatar(get_user_by_id($post['user_id']),30) ?>
        </div>
        
        <div class="post-details">
            <h4 class="text-sm"><?php echo $post['thread_name']; ?></h4>
            <span class="thread-name text-xs">Started by <?php echo $post['username']; ?> &#183; <?php echo time_ago($post['creation_date']); ?> &#183; <?php echo $post['topic_name']; ?></span>
        </div>
        
    </div>
    
<?php endforeach; ?>
</div>