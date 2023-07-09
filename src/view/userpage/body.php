<!-- views/body.php -->
<div class="mt-28 mb-2 mx-36">
    <div class="container p-0 content">
        <!-- Top Banner -->
        <div id="banner" class="d-flex align-items-center">
            <div class="avatar-container">
                <img src="path/to/user/avatar.jpg" class="avatar" alt="User Avatar">
            </div>
            <div class="user-details">
                <h1><?php echo $user['username']; ?></h1>
                <p>Date Joined: <?php echo $user['registration_date']; ?></p>
                <p>Total Posts: <?php echo $post_count; ?></p>
                <!-- Add more user details as needed -->
            </div>
        </div>

        <!-- Latest Activities -->
        <div class="latest-activities">
            <h2>Latest Activities</h2>
            <ul>
                <?php foreach ($activities as $activity): ?>
                    <li>
                        <span class="activity-type"><?php echo $activity['thread_subject']; ?>:</span>
                        <span class="activity-content"><?php echo $activity['post_date']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <hr>
        
        <!-- Footer -->
        <footer class="d-flex justify-content-between align-items-center">
            <div>
                <button class="btn" type="button">
                    <i class="bi bi-globe">
                    <span class="d-none d-md-inline">English (US)</span>
                    </i>
                </button>
            </div>

            <div class="socials">
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
