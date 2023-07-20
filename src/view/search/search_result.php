<?php $user = get_user_by_id($result['user_id']); ?>

<div class="p-0 drop-shadow">
<div class="w-100 border-b">
    <div class="d-flex align-items-center px-3">
    
        <?php 
        switch ($searchType) {
            case 'Threads':
            
                include 'thread.php';
                break;
            case 'Posts':
                include 'post.php';
                break;
            case 'Members':
                include 'member.php';
                break;
        }
        ?>
        
    </div>
</div>
</div>
