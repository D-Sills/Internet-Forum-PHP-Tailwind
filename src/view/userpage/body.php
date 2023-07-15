<!-- views/body.php -->
<div class="mt-28 mb-2 mx-2">
    <div class="container p-0 content">
        <!-- Top Banner -->
        <div id="banner">
            <div class="d-flex align-items-center p-3  m-3 drop-shadow">
                <div>
                    <?php echo generate_avatar($user, 100) ?>
                </div>
                <div>
                    <h1><?php echo $user['username']; ?></h1>
                    <p>Date Joined: <?php echo convert_timestamp($user['registration_date']) ?></p>
                    <p>Total Posts: <?php echo $stats['total_posts']; ?></p>
                    <p>Total Likes: <?php echo $stats['total_likes']; ?></p>
                </div>
            </div>
        </div>

        <!-- Latest Activities -->
        <div class="latest-activities m-3 p-3">
            <h2>Latest Activities</h2>
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
                    <i class="bi bi-globe text-2xl">
                    <span class="text-lg ">English (US)</span>
                    </i>
                </button>
            </div>
            
            <div class="text-2xl">
                <a target="_blank" href="https://twitter.com/elvin1803"><i class="bi bi-envelope"></i></a>
                <a target="_blank" href="https://twitter.com/elvin1803"><i class="bi bi-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/Darrizard"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-arrow-up-short"></i></a>
            </div>
        </footer>
        
    </div>
</div>

<!-- Copyright -->
<span class="py-2 mx-36">Website by us</span>
