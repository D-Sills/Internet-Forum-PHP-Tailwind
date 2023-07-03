<!-- views/body.php -->
<div class="mt-28 mb-2 mx-36">
<div class="container p-0 content">
    <!-- Banner -->
    <div id="banner">
        <img src="path/to/your/banner-image.jpg" class="w-100 img-fluid" alt="Banner Image">
        <h1>Welcome!</h1>
    </div>
    
    <!-- Main -->
    <div class="p-1 md:p-2 lg:p-6">
    <div class="container">
        <div class="row">
            <!-- Use a switch statement to decide which content to include based on the value of $page -->
            <div class="col-12 col-md-8">
                <?php switch ($page) {
                    case 'Home':
                        include 'categories.php';
                        break;
                    case 'Threads':
                        include 'threads_list.php';
                        break;
                } ?>
            </div>
            
            <!-- Include the sidebar -->
            <div class="col-0 col-md-4">
                <?php include 'sidebar.php'; ?> 
            </div>
        </div>
    </div>
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

<!-- Copyright stuff -->
<span class="py-2 mx-36">Website by us</span>