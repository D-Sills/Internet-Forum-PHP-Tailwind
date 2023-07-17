<!-- views/latest_posts.php -->
<div class="w-100 pt-2">
<?php foreach ($latest_posts as $post): ?>
    
    
    <div class="d-flex align-items-center mb-3">
    
        <div class="mr-3">
            <?php echo generate_avatar(get_user_by_id($post['user_id']),30) ?>
        </div>
        
        <a href="/<?php echo $base_url; ?>/?route=threads&id=<?php echo $post['thread_id']; ?>?page=1">
        <div class="w-100">
            <h4 class="text-sm"><?php echo $post['thread_name']; ?></h4>
            <span class="thread-name text-xs">Started by <?php echo $post['username']; ?> &#183; <?php echo time_ago($post['creation_date']); ?> &#183; <?php echo $post['topic_name']; ?></span>
        </div>
        </a>
    </div>
    
    
<?php endforeach; ?>
</div>