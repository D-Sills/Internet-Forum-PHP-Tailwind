<!-- views/threads.php -->
<a href="/<?php echo $base_url; ?>/threads/<?php echo clean_topic_name_for_url($thread['thread_subject']); ?>.<?php echo $thread['thread_id']; ?>">
<div class="w-100">
    <div class="d-flex align-items-center">
        <!-- Icon -->
        <div class="mr-3">
        poop
            <!-- <i class="<?php //echo $thread['topic_icon']; ?>"></i> -->
        </div>
        
        <!-- Topic Info -->
        <div>
        <h4><?php echo $thread['thread_subject']; ?></h4>
            <div class="topic-info">
                <span><i class="bi bi-chat-square-text"></i><?php echo $thread['thread_date']; ?></span>
            </div>
        </div>
        
    </div>
</div>
</a>