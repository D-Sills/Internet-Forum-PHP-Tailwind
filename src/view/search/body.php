<!-- views/body.php -->
<div class="mt-28 mb-2 mx-36">
    <div class="container p-0  mt-3 content">
        <!-- Top Banner -->
        <div class="p-3">
        <div>
            <?php 
            if(empty($searchResults)) {
                echo '<h2>Oops! We ran into some problems.</h2>';
            } else {
                echo '<h2>Search results for query: '.$searchQuery.'.</h2>';
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
                include 'search_result.php';
            endforeach;
        } ?>   
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