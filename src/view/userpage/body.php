<!-- views/body.php -->
<div class="mt-28 mb-2 mx-2">
<div class="container">
    <div class="p-0 content mt-3">
        <!-- Top Banner -->
        <div class="d-flex m-3 pr-3 pl-3 pt-4  ">
            <div class="mr-3">
                <?php 
                $avatar_html = '<a href="/'.$base_url.'/?route=user&id='.$got_user['user_id'].'">';

                $backgroundColor = generateRandomColor($got_user['username']);
                $firstLetter = strtoupper(substr($got_user['username'], 0, 1));
                $avatar_html .= '<div style="width:100px; height: 100px; background-color: ' . $backgroundColor . '; display: flex; justify-content: center; align-items: center; color: #fff; font-weight: bold; font-size: ' . (100 * 0.5) . 'px;">' . $firstLetter . '</div>';
                
                $avatar_html .= '</a>';
            
                echo $avatar_html;
                ?>
            </div>
            <div class="w-100">
                <h2 class="text-2xl mb-1"><?php 
                echo $got_user['username']; 
                switch ($got_user['privilege']) {
                    case 'moderator':
                        echo '<span class="ml-2 badge text-bg-success">Moderator</span>';
                        break;
                    case 'admin':
                        echo '<span class="ml-2 badge text-bg-danger">Administrator</span>';
                        break;
                    default:
                        // Handle the default case here
                        break;
                }
                ?>
                </h2>
                
                <span>Total Posts: <?php echo $stats['total_posts']; ?></span>
                <span>Likes Received: <?php echo $stats['total_likes']; ?></span>
                <span>Likes Given: <?php echo $stats['total_likes_given']; ?></span>
                <hr class="my-1">
                <span>Date Joined: <?php echo convert_timestamp($got_user['registration_date']) ?></span>
            </div>
        </div>

        <!-- Latest Activities -->
        <div class="latest-activities m-3 p-3">
            <h2 class="text-xl">Latest Activities</h2>
            <hr class="mb-3">
            <ul>
                <?php 
                foreach ($activities as $activity):
                    echo '<div class="odd-even">';
                    include 'activity.php';
                    echo '</div>';
                endforeach;
                ?>
            </ul>
        </div>
        
        <hr>
        <!-- Footer -->
        <footer class="d-flex justify-content-between align-items-center p-2">
            <div>
                <button class="btn" type="button">
                    <i class="bi bi-globe text-2xl"></i>
                    <span class="text-lg ">English (US)</span>
                </button>
            </div>
            
            <div class="text-2xl">
                <a target="_blank" href="https://i.kym-cdn.com/entries/icons/original/000/025/999/Screen_Shot_2018-04-24_at_1.33.44_PM.png"><i class="bi bi-envelope"></i></a>
                <a target="_blank" href="https://i.kym-cdn.com/entries/icons/original/000/025/999/Screen_Shot_2018-04-24_at_1.33.44_PM.png"><i class="bi bi-facebook"></i></a>
                <a target="_blank" href="https://i.kym-cdn.com/entries/icons/original/000/025/999/Screen_Shot_2018-04-24_at_1.33.44_PM.png"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-arrow-up font-extrabold"></i></a>
            </div>
        </footer>
        
    </div>
    
    <!-- Copyright stuff -->
    <p class=" my-2 mb-2 mx-2">Website by group 9 | 2023</p>
</div>
</div>
