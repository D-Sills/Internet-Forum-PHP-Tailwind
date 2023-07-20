<?php $thread = get_thread($result['thread_id']); ?>

<!-- Icon -->
<div class="pr-4">
    <?php echo generate_avatar($user, 60); ?>
</div>

<!-- Topic Info -->
<div class="py-2">
    <a href="/<?php echo $base_url; ?>/?route=threads&id=<?php echo $thread['thread_id']; ?>?page=1">
        <h4 class="text-md"><?php echo $thread['thread_name']; ?></h4>
        <p class="text-sm"><?php echo $result['post_content']; ?></p>
        <div>
            <span class="text-xs"><?php echo $user['username']; ?> &#183; <?php echo convert_timestamp($thread['creation_date']) ?> &#183; <?php echo $thread['topic_name']; ?></span>
        </div>
    </a>
</div>