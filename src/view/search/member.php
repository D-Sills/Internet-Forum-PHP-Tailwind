<?php $stats = get_user_stats($result['user_id']) ; ?>

<!-- Icon -->
<div class="pr-4">
    <?php echo generate_avatar($user, 60); ?>
</div>

<!-- Topic Info -->
<div class="py-2">
    <a href="/<?php echo $base_url; ?>/?route=user&id=<?php echo $result['user_id']; ?>">
        
        <h4 class="text-md"><?php echo $result['username']; ?></h4>
        <div class="text-sm">
            <span>Total Posts: <?php echo $stats['total_posts']; ?></span>
            <span>Likes Received: <?php echo $stats['total_likes']; ?></span>
            <span>Likes Given: <?php echo $stats['total_likes_given']; ?></span>
            <div>
                <?php echo convert_timestamp($result['registration_date']) ?>
            </div>
        </div>
        
    </a>
</div>