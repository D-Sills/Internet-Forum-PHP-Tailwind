<?php $thread = get_thread($activity['thread_id'])?>

<div class="p-0 drop-shadow">
        <div class="w-100 border-b">
            <div class="d-flex align-items-center px-3">
                <!-- Icon -->
                <div class="pr-4">
                    <?php echo generate_avatar($got_user, 40); ?>
                </div>
                
                <!-- Topic Info -->
                <div class="py-2">
                    <?php if ($activity['activity_type'] === 'like'): ?>
                        <p><?php echo $got_user['username']; ?> liked this post.</p>
                    <?php elseif ($activity['activity_type'] === 'post'): ?>
                        <a href="/<?php echo $base_url; ?>//?route=threads&id=<?php echo $thread['thread_id']; ?>?page=1">
                            <h4><?php echo $thread['thread_name']; ?></h4>
                            <div class="pt-1">
                                <span><?php echo $got_user['username']; ?> posted to this thread.</span>
                            </div>
                        </a>
                    <?php elseif ($activity['activity_type'] === 'create'): ?>
                        <a href="/<?php echo $base_url; ?>//?route=threads&id=<?php echo $thread['thread_id']; ?>?page=1">
                            <h4><?php echo $thread['thread_name']; ?></h4>
                            <div class="pt-1">
                                <span><?php echo $got_user['username']; ?> created this thread.</span>
                            </div>
                        </a>
                    <?php endif; ?>
                    <div class="pt-1">
                        <span><?php echo convert_timestamp($activity['activity_date']); ?> &#183; <?php echo $thread['topic_name']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>