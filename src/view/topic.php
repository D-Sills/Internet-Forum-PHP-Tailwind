<!-- views/topic.php -->
<?php
$threadCount = $threadCounts[$topic['topic_id']] ?? 0; // Use the thread count for the current topic or set it to 0 if not found
$postCount = $postCounts[$topic['topic_id']] ?? 0; // Use the post count for the current topic or set it to 0 if not found
?>

<a href="topic/<?php echo clean_topic_name_for_url($topic['topic_subject']); ?>.<?php echo $topic['topic_id']; ?>?page=1">
<div class="w-100">
    <div class="d-flex align-items-center">
        <!-- Icon -->
        <div class="mr-3">
            <i class="<?php echo $topic['topic_icon']; ?>"></i>
        </div>
        
        <!-- Topic Info -->
        <div>
        <h4><?php echo $topic['topic_subject']; ?></h4>
            <div class="topic-info">
                <span><i class="bi bi-chat-square-text"></i><?php echo $threadCount; ?></span>
                <span><i class="bi bi-chat-left"></i><?php echo $postCount; ?></span>
            </div>
        </div>
        
    </div>
</div>
</a>