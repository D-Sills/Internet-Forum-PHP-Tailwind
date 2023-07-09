<!-- views/latest_posts.php -->
<div class="w-100">
<?php foreach ($latest_posts as $post): ?>
    <div class="post">
        <div class="user-avatar">
            <img src="<?php //echo $post['avatar']; ?>" alt="User Avatar">
        </div>
        <div class="post-details">
            <h4 class="username"><?php echo $post['username']; ?></h4>
            <div class="post-info">
                <span class="timestamp"><?php echo time_ago($post['post_date']); ?></span>
                <span class="thread-name"><?php echo $post['topic_subject']; ?></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>