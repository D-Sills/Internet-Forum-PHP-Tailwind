<!-- views/forum_statistics.php -->
<div class="w-100 pt-2">
    <div class="d-flex justify-content-between">
        <div>
            <p>Total Posts:</p>
            <p>Total Threads:</p>
            <p>Total Members:</p>
            <p>Latest Member:</p>
        </div>
        <div class="text-right">
            <p><?php echo $forum_stats['total_posts']; ?></p>
            <p><?php echo $forum_stats['total_threads']; ?></p>
            <p><?php echo $forum_stats['total_members']; ?></p>
            <p><?php echo $forum_stats['newest_member']; ?></p>
        </div>
    </div>
</div>


