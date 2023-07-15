<div class="p-0">
<div class="w-100 border-b">
    <div class="d-flex align-items-center px-3">
        <!-- Icon -->
        <div class="pr-4">
            <?php echo generate_avatar(get_user_by_id($thread['creator_id']), 40); ?>
        </div>
        
        <!-- Topic Info -->
        <div class="py-2">
            <a href="/<?php echo $base_url; ?>/threads/<?php echo clean_topic_name_for_url($thread['thread_name']); ?>.<?php echo $thread['thread_id']; ?>?page=1">
                <h4><?php echo $thread['thread_name']; ?></h4>
                <div class="pt-1">
                    <span><?php echo $thread['creator_username']; ?> &#183; <?php echo convert_timestamp($thread['creation_date']) ?></span>
                </div>
            </a>
        </div>
    </div>
</div>
</div>


