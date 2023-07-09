<!-- views/post.php -->
<div class="w-100">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="mr-3">
            <img src="path/to/avatar.jpg" alt="Avatar" class="avatar">
        </div>
        
        <!-- Post Content -->
        <div>
            <div class="post-info">
                <span><i class="bi bi-clock"></i> <?php echo $post['post_date']; ?></span>
                <span>#<?php echo ($i + 1); ?></span>
            </div>
            <div class="post-content">
                <p><?php echo $post['post_content']; ?></p>
            </div>
        </div>
    </div>
</div>



