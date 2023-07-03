<!-- views/categories.php -->
<div class="accordion" id="accordionExample">
    <?php foreach ($categories as $category): ?>
        <div class="accordion-item">
            <!-- Header -->
            <h3 class="accordion-header" id="heading<?php echo $category['category_id']; ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $category['category_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $category['category_id']; ?>">
                    <h3><?php echo $category['category_name']; ?></h3>
                </button>
            </h3>

            <!-- Body -->
            <div id="collapse<?php echo $category['category_id']; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $category['category_id']; ?>">
                <div class="accordion-body">
                    <?php 
                    foreach ($topics as $topic): 
                        if ($topic['category_id'] === $category['category_id']): 
                            include 'topic.php';
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

