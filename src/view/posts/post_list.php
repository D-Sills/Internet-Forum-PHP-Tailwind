<!-- views/post_List.php -->
<div class="mb-3">
    <h2 class="text-xl"><?php echo $title; ?></h2>
    <h4 class="my-1 text-sm"><i class="bi bi-person pr-1"></i><?php echo $thread['thread_creator_username'] ?> &#183; <i class="bi bi-clock pr-1"></i><?php echo convert_timestamp($thread['creation_date']) ?></h4>
    
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/<?php echo $base_url; ?>/"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"> <?php echo $thread['category_name']; ?></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $thread['topic_id']; ?>?page=1"><?php echo $thread['topic_name']; ?></a></li>
        </ol>
    </nav>
    
    <?php include 'pagination.php'; ?>
</div>

<?php 
    $count = count($posts);
    $startIndex = ($pageNumber - 1) * $postsPerPage; // Calculate the start index based on the page number and posts per page

    for ($i = 0; $i < $count; $i++) {
        $post = $posts[$i];
        $postIndex = $startIndex + $i + 1; // Calculate the post index based on the start index and loop index
        include 'post.php';
    }
    ?>



<?php include 'pagination.php'; ?>
<?php include 'reply.php'; ?>