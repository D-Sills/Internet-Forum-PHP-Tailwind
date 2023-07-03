<!-- views/latest_posts.php -->
<div class="w-100">
<?php foreach ($latest_posts as $post): ?>
    <div class="post">
        <div class="user-avatar">
            <img src="<?php //echo $post['avatar']; ?>" alt="User Avatar">
        </div>
        <div class="post-details">
            <h4 class="username"><?php echo $post['username']; ?></h4>
            <p class="post-content"><?php echo $post['post_content']; ?></p>
            <div class="post-info">
                <span class="timestamp"><?php echo time_ago($post['post_date']); ?></span>
                <span class="thread-name"><?php echo $post['topic_subject']; ?></span>
                <span class="category-name"><?php echo $post['category_name']; ?></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>