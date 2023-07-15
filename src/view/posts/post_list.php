<!-- views/post_List.php -->
<div>
    <h2><?php echo $title; ?></h2>
    <h4><i class="bi bi-person pr-1"></i><?php echo $thread['thread_creator_username'] ?> &#183; <i class="bi bi-clock pr-1"></i><?php echo convert_timestamp($thread['creation_date']) ?></h4>
    
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/<?php echo $base_url; ?>/"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"> <?php echo $thread['category_name']; ?></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/<?php echo $base_url; ?>/topics/<?php echo clean_topic_name_for_url($thread['topic_name']); ?>.<?php echo $thread['topic_id']; ?>?page=1"><?php echo $thread['topic_name']; ?></a></li>
        </ol>
    </nav>
    
    <?php include 'pagination.php'; ?>
</div>

<div class = "pt-3">
<?php 
    $count = count($posts);
    for ($i = $count - 1; $i >= 0; $i--) {
        $post = $posts[$i];
        include 'post.php';
    }
?>
</div>

<?php include 'pagination.php'; ?>
<?php include 'reply.php'; ?>