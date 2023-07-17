<!-- views/body.php -->
<div class="mt-28 mb-2 mx-2">
<div class="container">
<div class=" p-0 content">
    <!-- Banner -->
    <div id="banner">
        <img src="/<?php echo $base_url; ?>/assets/images/banner.png" class="w-100 img-fluid" alt="Banner Image">
        <h1>Welcome!</h1>
    </div>
    
    <!-- Main -->
    <div class="p-1 p-md-2 p-lg-6">
    <div class="container mt-3">
        <div class="row">
            <!-- Use a switch statement to decide which content to include based on the value of $page -->
            <div class="col-12 col-lg-8">
                <?php switch ($page) {
                    case 'Home':
                        include 'home/categories.php';
                        break;
                    case 'Threads':
                        include 'threads/threads_list.php';
                        break;
                    case 'Posts':
                        include 'posts/post_list.php';
                        break;
                } ?>
            </div>
            
            <!-- Include the sidebar -->
            <div class="d-none d-lg-block col-4">
                <?php include 'sidebar/sidebar.php'; ?> 
            </div>
        </div>
    </div>
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



<?php switch ($page) {
    case 'Threads':
        include 'modals/new_thread.php';
        break;
} ?>
