<!-- views/topic.php -->
<?php
$threadCount = get_thread_count_by_topic($topic['topic_id']); // Use the thread count for the current topic or set it to 0 if not found
$postCount = get_post_count_by_topic($topic['topic_id']); // Use the post count for the current topic or set it to 0 if not found
?>

<a href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topic['topic_id']; ?>&page=1">
<div class="w-100 border-b border-l border-r">
    <div class="d-flex align-items-center  px-3">
        <!-- Icon -->
        <div class="pr-4">
            <i class="<?php echo $topic['topic_icon']; ?> text-2xl"></i>
        </div>
        
        <!-- Topic Info -->
        <div class="py-2">
        <h2><?php echo $topic['topic_name']; ?></h2>
            <div class="pt-1">
                <span class="pr-2"><i class="bi bi-chat-square-text pr-1"></i><?php echo $threadCount; ?></span>
                <span><i class="bi bi-chat-left pr-1"></i><?php echo $postCount; ?></span>
            </div>
        </div>
        
    </div>
</div>
</a>