<!-- views/body.php -->
<div class="mt-28 mb-2 mx-2">
<div class="container">
    <div class="p-0 content">
        <!-- Top Banner -->
        <div class="p-3">
        <div>
            <?php 
            if(empty($searchResults)) {
                echo '<h2 class="text-xl mb-1">Oops! We ran into some problems.</h2>';
            } else {
                echo '<h2 class="text-xl mb-1">Search results for query: '.$searchQuery.'</h2>';
            }
            ?>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/<?php echo $base_url; ?>/"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search</li>
                </ol>
            </nav>
        </div>

        <?php
        if(empty($searchResults)) {
            include 'no_results.php';
        } else {
            foreach ($searchResults as $result):
                echo '<div class="odd-even">';
                include 'search_result.php';
                echo '</div>';
            endforeach;
        } ?>   
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
